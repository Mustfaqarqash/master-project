<!--====== Section 4 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">NEW ARRIVALS</h1>

                        <span class="section__span u-c-silver">GET UP FOR NEW ARRIVALS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="slider-fouc">
                <div class="owl-carousel product-slider" data-item="3">
                    @foreach($offers as $offer)
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on" >
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">
                                        <img class="aspect__img" src="{{ asset('storage/' . $offer->images->first()->path) }}" alt="{{$offer->name}}">
                                    </a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>
                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View">
                                                    <i class="fas fa-search-plus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart">
                                                    <i class="fas fa-plus-circle"></i>
                                                </a>
                                            </li>

                                            <!-- Wishlist toggle logic -->
                                            <li>
                                                @auth
                                                    <form method="POST" action="{{ route('offers.favorite', ['offer' => $offer->id ]) }}">
                                                        @csrf
                                                        <button type="submit" class="icon-button" data-tooltip="tooltip" data-placement="top" title="{{ $offer->isFavoritedBy(auth()->user()) ? 'Remove from Wishlist' : 'Add to Wishlist' }}">
                                                            <i class="fas fa-heart {{ $offer->isFavoritedBy(auth()->user()) ? 'u-c-secondary' : '' }}"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('login') }}" data-tooltip="tooltip" data-placement="top" title="Login to Add to Wishlist">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @endauth
                                            </li>
                                            <li>
                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops">
                                                    <i class="fas fa-envelope"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <span class="product-o__category">

                                            <a href="shop-side-version-2.html">{{$offer->category->name}}</a>
                                </span>

                                <span class="product-o__name">

                                            <a href="product-detail.html">{{$offer->title}}</a>
                                </span>
{{--                                <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>--}}

{{--                                    <span class="product-o__review">(0)</span></div>--}}
                                <br>
                                <span style="display: flex; align-items: center; gap: 10px;">
                                <!-- Store Image -->
                                <img src="{{ asset('storage/' . $offer->store->image) }}" alt="{{ $offer->store->name }}" style="width:40px; height: 40px; border-radius: 50%; object-fit: cover;">

                                                                <!-- Store Name -->
                                <a href="product-detail.html" style="text-decoration: none; color: inherit; font-size: 1rem; font-weight: 500;">
                                    {{ $offer->store->name }}
                                </a>
                            </span>



                            </div>


                        </div>

                    @endforeach



                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 4 ======-->

