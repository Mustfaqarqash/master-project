@extends('layouts.userPage')
@section('content')

    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-p">
                            <div class="shop-p__toolbar u-s-m-b-30">
                                <div class="shop-p__meta-wrap u-s-m-b-60">

                                    <span class="shop-p__meta-text-1">FOUND 18 RESULTS</span>
                                    <div class="shop-p__meta-text-2">

                                        <span>Related Searches:</span>

                                        <a class="gl-tag btn--e-brand-shadow" href="#">men's clothing</a>

                                        <a class="gl-tag btn--e-brand-shadow" href="#">mobiles & tablets</a>

                                        <a class="gl-tag btn--e-brand-shadow" href="#">books & audible</a></div>
                                </div>
                                <div class="shop-p__tool-style">
                                    <div class="tool-style__group u-s-m-b-8">

                                        <span class="js-shop-filter-target" data-side="#side-filter">Filters</span>

                                        <span class="js-shop-grid-target is-active">Grid</span>

                                        <span class="js-shop-list-target ">List</span></div>
                                    <form>
                                        <div class="tool-style__form-wrap">
                                            <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                    <option>Show: 8</option>
                                                    <option selected>Show: 12</option>
                                                    <option>Show: 16</option>
                                                    <option>Show: 28</option>
                                                </select></div>
                                            <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                    <option selected>Sort By: Newest Items</option>
                                                    <option>Sort By: Latest Items</option>
                                                    <option>Sort By: Best Selling</option>
                                                    <option>Sort By: Best Rating</option>
                                                    <option>Sort By: Lowest Price</option>
                                                    <option>Sort By: Highest Price</option>
                                                </select></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="shop-p__collection">
                                <div class="row is-grid-active">
                                    @foreach($offers as $offer)
                                        <!--====== Product Card ======-->
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="product-m">
                                                <div class="product-m__thumb">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{ route('productDetails', $offer->id) }}">

                                                        <img class="aspect__img" src="{{ asset('storage/' . $offer->images->first()->path) }}" alt=""></a>
                                                    <div class="product-m__quick-look">
                                                        <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look-{{$offer->id}}" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a>
                                                    </div>
                                                    <div class="product-m__add-cart">



                                                    </div>
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a href="shop-side-version-2.html">{{$offer->category->name}}</a></div>
                                                    <div class="product-m__name">

                                                        <a  href="{{ route('productDetails', $offer->id) }}">{{$offer->name}}</a></div>
                                                    <div class="product-m__rating gl-rating-style">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= floor($offer->averageRating))
                                                                <i class="fas fa-star"></i>
                                                            @elseif ($i - $offer->averageRating < 1)
                                                                <i class="fas fa-star-half-alt"></i>
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor
                                                        <span class="product-m__review">({{ $offer->totalReviews }} reviews)</span>

                                                    </div>
                                                    <div class="product-m__price">${{number_format($offer->price , 2)}}</div>
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">

                                                            <span>{{$offer->description}}</span></div>
                                                        <div class="product-m__wishlist">

                                                            <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--====== End Product Card ======-->

                                        <!--====== Quick Look Modal ======-->
                                        {{--                                        @include('userSide.productPage.quickviewModal')--}}
                                        <!--====== End - Quick Look Modal ======-->

                                        <!--====== Add to Cart Modal ======-->
                                        {{--                                        @include('userSide.productPage.addToCartModal')--}}
                                        <!--====== End - Add to Cart Modal ======-->
                                    @endforeach

                                </div>
                            </div>
                            <div class="u-s-p-y-60">

                                <!--====== Pagination ======-->
                                <ul class="shop-p__pagination">
                                    <li class="is-active">

                                        <a href="shop-list-full.html">1</a></li>
                                    <li>

                                        <a href="shop-list-full.html">2</a></li>
                                    <li>

                                        <a href="shop-list-full.html">3</a></li>
                                    <li>

                                        <a href="shop-list-full.html">4</a></li>
                                    <li>

                                        <a class="fas fa-angle-right" href="shop-list-full.html"></a></li>
                                </ul>
                                <!--====== End - Pagination ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->
    </div>
    <!--====== End - App Content ======-->


@endsection
