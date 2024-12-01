@extends('layouts.userPage')
@section('content')
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 150px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-90">
            <div class="container mb-50">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-p">
                            <div class="shop-p__toolbar u-s-m-b-30">
                                <div class="slider-fouc">
                                    <div class="owl-carousel product-slider " data-item="10"  >

                                            @foreach($offerStores as $offerStore)
                                                <img src="{{ asset('storage/' . $offerStore->image) }}" alt="Category Image"
                                                     style="border-radius: 50%; object-fit: cover; width:100px; height: 100px; cursor: pointer;"
                                                     data-store-id="{{ $offerStore->id }}" class="store-filter">
                                            @endforeach



                                    </div>
                                </div>

                                <div class="shop-p__tool-style">
                                    <div class="tool-style__group u-s-m-b-8">
                                        <span class="js-shop-filter-target" data-side="#side-filter">Filters</span>
                                        <span class="js-shop-grid-target is-active">Grid</span>
                                        <span class="js-shop-list-target">List</span>
                                    </div>

                                    <form>
                                        <div class="tool-style__form-wrap">
                                            <div class="u-s-m-b-8">
                                                <select class="select-box select-box--transparent-b-2">
                                                    <option>Show: 8</option>
                                                    <option selected>Show: 12</option>
                                                    <option>Show: 16</option>
                                                    <option>Show: 28</option>
                                                </select>
                                            </div>

                                            <div class="u-s-m-b-8">
                                                <select class="select-box select-box--transparent-b-2">
                                                    <option selected>Sort By: Newest Items</option>
                                                    <option>Sort By: Latest Items</option>
                                                    <option>Sort By: Best Selling</option>
                                                    <option>Sort By: Best Rating</option>
                                                    <option>Sort By: Lowest Price</option>
                                                    <option>Sort By: Highest Price</option>
                                                </select>
                                            </div>
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

                                                        <img class="aspect__img" src="{{ asset('storage/' . $offer->images->first()->path) }}" alt="">
                                                    </a>
                                                    <div class="product-m__quick-look">
                                                        <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look-{{$offer->id}}" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a>
                                                    </div>

                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">
                                                        <a href="shop-side-version-2.html">{{$offer->category->name}}</a>
                                                    </div>
                                                    <div class="product-m__name">
                                                        <a  href="{{ route('productDetails', $offer->id) }}">{{$offer->name}}</a>
                                                    </div>
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">
                                                            <span>{{$offer->description}}</span>
                                                        </div>
                                                        <div class="product-m__wishlist">
                                                            <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--====== End Product Card ======-->

                                        <!--====== Quick Look Modal ======-->
                                          @include('userSide.offerPage.quickviewModal')
                                        <!--====== End - Quick Look Modal ======-->

                                        <!--====== Add to Cart Modal ======-->
                                        {{--                                        @include('userSide.productPage.addToCartModal')--}}
                                        <!--====== End - Add to Cart Modal ======-->
                                    @endforeach

                                </div>
                            </div>
                            <div class="u-s-p-y-60">
                                <!--====== Pagination ======-->
                                {{ $offers->links('vendor.pagination.custom') }}
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
    <script>
        document.querySelectorAll('.store-filter').forEach(image => {
            image.addEventListener('click', function () {
                const storeId = this.getAttribute('data-store-id');

                fetch(`?store_id=${storeId}`)
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const newContent = parser.parseFromString(html, 'text/html')
                            .querySelector('.shop-p__collection');
                        document.querySelector('.shop-p__collection').innerHTML = newContent.innerHTML;
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

    </script>

@endsection
