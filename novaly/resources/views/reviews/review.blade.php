<div id="reviews">
    <div class="inline">
        <span>
            <input type="number" class="rating" value="{{ $review->rating }}" data-inline data-readonly>
            <span class="review-title">{{ $review->title }}</span>
        </span>
    </div>

    <p><span class="review-user">By {{ $review->user->name }} on {{ $review->created_at->toDayDateTimeString() }}</span></p>

    @if ($review->hasText())

    <p class="review-text">
        {{ $review->text }}
    </p>

    @endif

    <hr>

</div>
