@foreach ($books as $index => $book)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>
            @if ($book->cover_image)
                <img class="img-list" src="{{ $book->cover_image }}" alt="{{ $book->title }} Cover">
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
