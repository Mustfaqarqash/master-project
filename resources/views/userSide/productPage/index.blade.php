@extends('layouts.userPage')
@section('content')

    <!--====== App Content ======-->
    <div class="app-content">
        @if (session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
        @endif
        @if (session('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
        <!--====== Section 1 ======-->
        <div class="u-s-p-y-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="shop-w-master">
                            <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>
                                <span>FILTERS</span></h1>
                            <div class="shop-w-master__sidebar sidebar--bg-snow">
                                <div class="u-s-m-b-30">
                                    <div class="shop-w">
                                        <div class="shop-w__intro-wrap">
                                            <h1 class="shop-w__h">SUBCATEGORY</h1>
                                            <span class="fas fa-minus shop-w__toggle" data-target="#s-subcategory" data-toggle="collapse"></span>
                                        </div>
                                        <div class="shop-w__wrap collapse show" id="s-subcategory">
                                            <ul class="shop-w__category-list gl-scroll">
                                                <li class="has-list">
                                                    <ul style="display:block">
                                                        @foreach($subcategories as $subcategory)
                                                            <li>
                                                                <a href="{{ route('productPage', ['subcategory' => $subcategory->id]) }}">{{ $subcategory->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rating filter -->
                                <div class="u-s-m-b-30">
                                    <div class="shop-w">
                                        <div class="shop-w__intro-wrap">
                                            <h1 class="shop-w__h">RATING</h1>
                                            <span class="fas fa-minus shop-w__toggle" data-target="#s-rating" data-toggle="collapse"></span>
                                        </div>
                                        <div class="shop-w__wrap collapse show" id="s-rating">
                                            <ul class="shop-w__list gl-scroll">
                                                @foreach($ratingCounts as $stars => $count)
                                                    <li>
                                                        <a href="{{ route('productPage', ['rating' => $stars]) }}">
                                                            @for($i = 0; $i < $stars; $i++)
                                                                <i class="fas fa-star"></i>
                                                            @endfor
                                                            @for($i = 0; $i < 5 - $stars; $i++)
                                                                <i class="far fa-star"></i>
                                                            @endfor
                                                            & Up
                                                        </a>
                                                        <span class="shop-w__total-text">({{ $count }})</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price filter -->
                                <div class="u-s-m-b-30">
                                    <div class="shop-w">
                                        <div class="shop-w__intro-wrap">
                                            <h1 class="shop-w__h">PRICE</h1>
                                            <span class="fas fa-minus shop-w__toggle" data-target="#s-price" data-toggle="collapse"></span>
                                        </div>
                                        <div class="shop-w__wrap collapse show" id="s-price">
                                            <form class="shop-w__form-p" action="{{ route('productPage') }}" method="GET">
                                                <div class="shop-w__form-p-wrap">
                                                    <div>
                                                        <label for="price-min"></label>
                                                        <input class="input-text input-text--primary-style" type="text" name="price_min" id="price-min" placeholder="Min">
                                                    </div>
                                                    <div>
                                                        <label for="price-max"></label>
                                                        <input class="input-text input-text--primary-style" type="text" name="price_max" id="price-max" placeholder="Max">
                                                    </div>
                                                    <div>
                                                        <button class="btn btn--icon fas fa-angle-right btn--e-transparent-platinum-b-2" type="submit"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
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

                                        <span class="js-shop-grid-target is-active">Grid</span>

                                        <span class="js-shop-list-target">List</span></div>
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
                                    @foreach($products as $product)
                                    <!--====== Product Card ======-->
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product-m">
                                            <div class="product-m__thumb">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{ route('productDetails', $product->id) }}">

                                                    <img class="aspect__img" src="{{ asset('storage/' . $product->image->path) }}" alt=""></a>
                                                <div class="product-m__quick-look">
                                                    <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look-{{$product->id}}" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a>
                                                </div>
                                                <div class="product-m__add-cart">

                                                    <a class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart-{{$product->id}}">
                                                        <form class="pd-detail__form" action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                                            @csrf <!-- Laravel CSRF protection -->
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                                            <input type="hidden" name="quantity" value="1" min="1" max="{{ $product->quantity }}" required>
                                                            <button type="submit" style="background: none; border: none; padding: 0; margin: 0; color: inherit; cursor: pointer;">
                                                                Add to Cart
                                                            </button>
                                                        </form>
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="product-m__content">
                                                <div class="product-m__category">

                                                    <a href="shop-side-version-2.html">{{$product->subCategory->name}}</a></div>
                                                <div class="product-m__name">

                                                    <a  href="{{ route('productDetails', $product->id) }}">{{$product->name}}</a></div>
                                                <div class="product-m__rating gl-rating-style">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= floor($product->averageRating))
                                                            <i class="fas fa-star"></i>
                                                        @elseif ($i - $product->averageRating < 1)
                                                            <i class="fas fa-star-half-alt"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                    <span class="product-m__review">({{ $product->totalReviews }} reviews)</span>

                                                </div>
                                                <div class="product-m__price">${{number_format($product->price , 2)}}</div>
                                                <div class="product-m__hover">
                                                    <div class="product-m__preview-description">

                                                        <span>{{$product->description}}</span></div>
                                                    <div class="product-m__wishlist">

                                                        <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   <!--====== End Product Card ======-->

                                    <!--====== Quick Look Modal ======-->
                                    @include('userSide.productPage.quickviewModal')
                                    <!--====== End - Quick Look Modal ======-->

                                    <!--====== Add to Cart Modal ======-->
                                    @include('userSide.productPage.addToCartModal')
                                    <!--====== End - Add to Cart Modal ======-->
                                    @endforeach
                                </div>
                            </div>
                            {{ $products->links('vendor.pagination.custom') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->

    </div>
    <!--====== End - App Content ======-->


@endsection
