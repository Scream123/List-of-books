<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function index(Request $request): string
    {
        $user = Auth::user();
        $sortField = $request->get('sort') ?? 'created_at';
        $sortOrder = $request->get('order') ?? 'desc';

        $booksQuery = Book::leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->select('books.*',
                DB::raw('COALESCE(AVG(ratings.rating), 0) as average_rating'),
                DB::raw('COALESCE(MAX(ratings.rating), 0) as max_rating'))
            ->groupBy('books.id', 'books.title', 'books.author', 'books.cover_image', 'books.description',
                'books.published_date', 'books.created_at', 'books.updated_at', 'ratings.rating');

        if ($sortField === 'average_rating' || $sortField === 'max_rating') {
            $booksQuery->orderBy(DB::raw('COALESCE(' . $sortField . ', 0)'), $sortOrder);
            $booksQuery->orderBy('created_at', 'desc');
        } else {
            $booksQuery->orderBy($sortField, $sortOrder);
        }

        if ($request->has('query')) {
            $query = $request->input('query');
            $booksQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%$query%")
                    ->orWhere('author', 'like', "%$query%");
            });
        }

        $books = $booksQuery->paginate(10);

        if ($request->ajax()) {
            return view('components.book-list', [
                'books' => $books,
                'sortField' => $sortField,
                'sortOrder' => $sortOrder,
            ])->render();
        }

        return view('books.index', [
            'books' => $books,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
            'user' => $user,
        ]);
    }

    public function store(StoreBookRequest $request): JsonResponse
    {

        try {
            $file = $request->file('cover_image');
            $path = $file->store('books', 'public');
            $url = Storage::url($path);

            $book = Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'published_date' => $request->published_date,
                'cover_image' => $url,
                'description' => $request->description,
            ]);

            return response()->json(['message' => 'The book was successfully created.', 'book' => $book], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create book', 'error' => $e->getMessage()], 422);
        }
    }


    public function show(string $id): View
    {
        $book = Book::find($id);

        if (!$book) {
            abort(404, 'Book not found');
        }

        $averageRating = $book->averageRating();

        return view('books.show', [
            'book' => $book,
            'averageRating' => $averageRating,
        ]);
    }


    public function search(Request $request): View
    {
        $query = $request->input('query');

        $books = Book::select('books.*', DB::raw('COALESCE(AVG(ratings.rating), 0) as average_rating'))
            ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->where('books.title', 'LIKE', "%$query%")
            ->orWhere('books.author', 'LIKE', "%$query%")
            ->groupBy('books.id')
            ->get();

        return view('components.search', ['books' => $books]);
    }

    public function rateBook(RateBookRequest $request, string $bookId): JsonResponse
    {
        $user = $request->user();

        Rating::updateOrCreate(
            ['book_id' => $bookId, 'user_id' => $user->id],
            ['rating' => $request->rating]
        );

        $averageRating = Rating::where('book_id', $bookId)->avg('rating');

        return response()->json(['message' => 'Book rated successfully', 'newRating' => $averageRating], 200);
    }

    public function storeComment(StoreCommentRequest $request, string $bookId): JsonResponse
    {
        try {
            $comment = new Comment([
                'book_id' => $bookId,
                'user_id' => auth()->id(),
                'content' => $request->input('content'),
            ]);

            $comment->save();

            return response()->json([
                'success' => true,
                'message' => 'Comment added!',
                'comment' => $comment
            ]);
        } catch (\Exception $e) {
            Log::error('Error adding comment: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while adding the comment.'
            ], 500);
        }
    }
}
