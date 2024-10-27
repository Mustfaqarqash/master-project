<!--====== FEATURED PRODUCTS ======-->
<div class="u-s-p-y-60">
    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">FEATURED PRODUCTS</h1>
                        <span class="section__span u-c-silver">FIND NEW FEATURED PRODUCTS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                @foreach($featuerdProducts as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                        <div class="product-o product-o--hover-on u-h-100">
                            <div class="product-o__wrap">
                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{ route('productDetails', $product->id) }}">
                                    <img class="aspect__img" src="{{ asset('storage/' . $product->image->path) }}" alt="{{ $product->name }}">
                                </a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li><a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View" href="{{ route('productDetails', $product->id) }}"><i class="fas fa-search-plus"></i></a></li>
                                        <li><a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                        <li><a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        <li><a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">
                                <a href="shop-side-version-2.html">{{ $product->subCategory->name ?? 'Category' }}</a>
                            </span>

                            <span class="product-o__name">
                                <a href="{{ route('productDetails', $product->id) }}">{{ $product->name }}</a>
                            </span>

                            <div class="product-o__rating gl-rating-style">
                                @php
                                    $rating = $product->averageRating;
                                    $stars = floor($rating);
                                    $halfStar = $rating - $stars >= 0.5;
                                @endphp

                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $stars)
                                        <i class="fas fa-star"></i>
                                    @elseif ($i == $stars && $halfStar)
                                        <i class="fas fa-star-half-alt"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                                <span class="product-o__review">({{ $product->totalReviews }})</span>
                            </div>

                            <span class="product-o__price">${{ $product->price }}
                                @if($product->discount > 0)
                                    <span class="product-o__discount">
                                        ${{ number_format($product->price - ($product->price * ($product->discount / 100)), 2) }}
                                    </span>
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - FEATURED PRODUCTS ======-->
