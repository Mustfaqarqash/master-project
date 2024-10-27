<div class="tab-pane" id="pd-rev">
    <div class="pd-tab__rev">
        <div class="u-s-m-b-30">
            <form class="pd-tab__rev-f1">

                @foreach($reviewes as $review)
                    <div class="rev-f1__review">
                        <div class="review-o u-s-m-b-15">
                            <div class="review-o__info u-s-m-b-8">
                                <span class="review-o__name">{{ $review->user->name ?? 'Anonymous' }}</span>
                                <span class="review-o__date">{{ $review->created_at->format('d M Y H:i:s') }}</span>
                            </div>
                            <p class="review-o__text">{{ $review->feedback }}</p>
                        </div>
                    </div>
                @endforeach



            </form>
        </div>
        <div class="u-s-m-b-30">
            <form class="pd-tab__rev-f2" action="{{ route('product.feedback.store') }}" method="POST">
                @csrf <!-- Laravel CSRF protection -->

                <span class="gl-text u-s-m-b-15">Your email address will not be published. Required fields are marked *</span>

                <div class="rev-f2__group">
                    <div class="u-s-m-b-15">
                        <label class="gl-label" for="reviewer-text">YOUR REVIEW *</label>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea class="text-area text-area--primary-style" id="reviewer-text" name="feedback" required></textarea>
                    </div>
                </div>
                <div>
                    <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button>
                </div>
            </form>


        </div>
    </div>
</div>
