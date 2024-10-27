<div class="u-s-p-b-90">
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">CUSTOMER ALSO VIEWED</h1>
                        <span class="section__span u-c-grey">PRODUCTS THAT CUSTOMER VIEWED</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section__content">
        <div class="container">
            <div class="slider-fouc">
                <div class="owl-carousel product-slider" data-item="4">
                    @foreach($relatedProduct as $related)
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">
                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{ route('productDetails', $related->id) }}" >
                                        <img class="aspect__img" src="{{ asset('storage/' .  $related->images->first()->path) ?? 'default-image.jpg' }}" alt="{{ $related->name }}">
                                    </a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>
                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View" href="{{ route('productDetails', $related->id) }}"><i class="fas fa-search-plus"></i></a>
                                            </li>
                                            <li>
                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                            </li>
                                            <li>
                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                            </li>
                                            <li>
                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">
                                    <a href="{{ route('productDetails', $related->id) }}"> {{ $related->subCategory->name }}</a>
                                </span>
                                <span class="product-o__name">
                                    <a >{{ $related->name }}</a>
                                </span>
                                <div class="product-o__rating gl-rating-style">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= floor($related->averageRating))
                                            <i class="fas fa-star"></i> <!-- Full Star -->
                                        @elseif ($i - $related->averageRating < 1)
                                            <i class="fas fa-star-half-alt"></i> <!-- Half Star -->
                                        @else
                                            <i class="far fa-star"></i> <!-- Empty Star -->
                                        @endif
                                    @endfor
                                    <span class="product-o__review">({{ $related->rates->count() }} reviews)</span>
                                </div>
                                <span class="product-o__price">
                                    ${{ number_format($related->price, 2) }}
                                    <span class="product-o__discount">${{ number_format($related->discount, 2) }}</span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
