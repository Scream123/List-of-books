@extends('layouts.app')

@section('content')
    @php $showBooksIndexUrl = false; @endphp
    <div class="container">
        <h1>Search Results</h1>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Cover image</th>
                <th>
                    <a href="#" data-sort-field="title" data-sort-order="desc"
                       onclick="event.preventDefault(); sortBooks(this)">
                        Title
                        <span class="sort-arrow">&#9660;</span>
                    </a>
                </th>
                <th>
                    <a href="#" data-sort-field="rating" data-sort-order="desc"
                       onclick="event.preventDefault(); sortBooks(this)">
                        Rating
                        <span class="sort-arrow">&#9660;</span>
                    </a>
                </th>
                <th>Author</th>
                <th>Publication date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="book-list">
            @foreach ($books as $index => $book)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if ($book->cover_image)
                            <img src="{{ $book->cover_image }}" alt="{{ $book->title }} Cover"
                                 style="max-width: 100px; max-height: 100px;">
                        @else
                            Image not available
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>
                        @include('partials.rating', ['book' => $book])
                    </td>

                    <td>{{ $book->author }}</td>
                    <td>{{ $book->published_date }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('books.index') }}" class="btn btn-primary btn-custom">Back to all books</a>
    </div>
@endsection
