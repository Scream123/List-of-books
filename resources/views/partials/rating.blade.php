<div class="wrapper">
    <div class="form">
        <div class="form-item">
            <div class="form-label"></div>
            @if(Auth::check())
                <div data-ajax="true" class="rating rating-set" data-book-id="{{ $book->id }}">
                    <div class="rating-body">
                        <div class="rating-active"></div>
                        <div class="rating-items">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" class="rating-item" name="rating" value="{{ $i }}">
                            @endfor
                        </div>
                    </div>
                    <div class="rating-value">{{ $book->average_rating }}</div>
                </div>
            @else
                <div class="rating">
                    <div class="rating-body">
                        <div class="rating-active" style="width: {{ $book->average_rating * 20 }}%;"></div>
                    </div>
                    <div class="rating-value">{{ $book->average_rating }}</div>
                </div>
            @endif
        </div>
    </div>
    <!-- Success Toast for Rating -->
    @include('partials.toast-rating', ['book' => $book])
</div>
