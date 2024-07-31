@extends('layouts.app')

@section('content')
    @php $showBooksIndexUrl = true; @endphp

    <div class="container">
        <h1>List of books</h1>
        <div id="add-book-form-container" data-route-create="{{ route('books.add') }}"></div>

        <form id="searchForm" action="{{ route('books.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by title or author" name="query"
                       id="searchQuery">
                <div class="input-group-append">
                    <button id="searchButton" class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <div class="button-container">
            @auth
                <button id="show-add-book-form" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addBookModal">
                    Add a book
                </button>
            @else
                <button id="show-login-message" class="btn btn-secondary btn-custom">Add a book</button>
                <div id="login-message" class="alert alert-info mt-3" style="display: none;">
                    To add a book, <a href="{{ route('login') }}">Log in</a> or <a href="{{ route('register') }}">register</a>.
                </div>
            @endauth

            <a href="{{ route('books.index') }}" class="btn btn-primary btn-custom">Update book list</a>
        </div>

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
            @component('components.book-list', ['books' => $books])
            @endcomponent
            </tbody>
        </table>
    </div>
@endsection
