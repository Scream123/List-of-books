@extends('layouts.app')

@section('content')
    @php $showBooksIndexUrl = false; @endphp

    <div class="container my-4">
        <div class="row d-flex flex-wrap align-items-start">
            <div class="col-md-3 mb-3 img-div">
                <img src="{{ asset($book->cover_image) }}" alt="Book cover">
            </div>
            <div class="col-md-9 mb-3 book-info">
                <p><strong>Title:</strong>{{ $book->title }}</p>
                <p><strong>Author:</strong> {{ $book->author }}</p>
                <p><strong>Publication Date:</strong> {{ $book->published_date ?? 'Not specified' }}</p>
                <div class="book-description mb-3">
                    <p><strong>Description:</strong></p>
                    <p class="description-text">{{ $book->description }}</p>
                    <a href="#" class="read-more">Read more</a>
                </div>


                <!-- Rating Section -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="wrapper">
                            <div class="form">
                                @if(Auth::check())
                                    <div data-ajax="true" class="rating rating-set" data-book-id="{{ $book->id }}">
                                        <div class="rating-body">
                                            <div class="rating-active"></div>
                                            <div class="rating-items">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <input type="radio" class="rating-item" name="rating"
                                                           value="{{ $i }}">
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="rating-value">{{ $averageRating }}</div>
                                    </div>
                                @else
                                    <div class="rating">
                                        <div class="rating-body">
                                            <div class="rating-active" style="width: {{ $averageRating * 20 }}%;"></div>
                                        </div>
                                        <div class="rating-value">{{ $averageRating }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @include('partials.toast-rating', ['book' => $book])
                    </div>
                </div>
            </div>
        </div>


        <!-- Return to List Button -->
        <div class="mb-3">
            <a href="{{ route('books.index') }}" class="btn btn-primary">Return to List of Books</a>
        </div>
        <!-- Comments Section -->
        <div class="row mb-3">
            <div class="col-md-12">
                @if (auth()->check())
                    <form id="comment-form" action="{{ route('books.comments.store', $book->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <div class="form-group">
                            <label for="content">A comment:</label>
                            <textarea id="content" name="content" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary">Add a comment</button>
                    </form>
                @else
                    <button type="button" class="btn btn-secondary">Add a comment</button>
                    <div id="login-message" class="alert alert-info mt-3" style="display: none;">
                        To add a comment, <a href="{{ route('login') }}">Log in</a> or <a
                            href="{{ route('register') }}">register</a>.
                    </div>
                @endif
            </div>
        </div>

        <!-- Comments List -->
        <div class="row">
            <div class="col-md-12">
                <h3>Comments:</h3>
                <div id="comment-list">
                    @foreach ($book->comments as $comment)
                        <div class="comment mb-2">
                            <strong>{{ $comment->user->name }}</strong>
                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Toast Container for Comment -->
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="comment-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Success</strong>
                        <small>Just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Your comment was successfully added!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
