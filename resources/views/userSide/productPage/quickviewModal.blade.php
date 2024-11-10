<div class="modal fade" id="quick-look-{{$product->id}}">
    <div id="quick-look">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content modal--shadow">

                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5">

                            <!--====== Product Breadcrumb ======-->
                            <div class="pd-breadcrumb u-s-m-b-30">
                                <ul class="pd-breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="index.hml">Home</a></li>
                                    <li class="has-separator">

                                        <a href="shop-side-version-2.html">Electronics</a></li>
                                    <li class="has-separator">

                                        <a href="shop-side-version-2.html">DSLR Cameras</a></li>
                                    <li class="is-marked">

                                        <a href="shop-side-version-2.html">Nikon Cameras</a></li>
                                </ul>
                            </div>
                            <!--====== End - Product Breadcrumb ======-->


                            <!--====== Product Detail Zoom ======-->
                            <div class="pd u-s-m-b-30">
                                <div class="pd-wrap">
                                    <div id="js-product-detail-modal">

                                        <div>
                                            <img class="u-img-fluid" src="{{ asset('storage/' .$product->images->first()->path) }}" alt="{{ $product->name }}">
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!--====== End - Product Detail Zoom ======-->

                        </div>
                        <div class="col-lg-7">

                            <!--====== Product Right Side Details ======-->
                            <div class="pd-detail">
                                <div>

                                    <span class="pd-detail__name">{{$product->name}}</span></div>
                                <div>
                                    <div class="pd-detail__inline">

                                        @php
                                            $originalPrice = $product->price;
                                            $discountPercentage = $product->discount;
                                            $discountAmount = $originalPrice * ($discountPercentage / 100);
                                            $finalPrice = $originalPrice - $discountAmount;
                                        @endphp

                                        <span class="pd-detail__price">${{ number_format($finalPrice, 2) }}</span>
                                        <span class="pd-detail__discount">({{ $discountPercentage }}% OFF)</span>
                                        <del class="pd-detail__del">${{ number_format($originalPrice, 2) }}</del>
                                    </div>
                                    <div class="product-o__rating gl-rating-style">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($product->averageRating))
                                                <i class="fas fa-star"></i> <!-- Full Star -->
                                            @elseif ($i - $product->averageRating < 1)
                                                <i class="fas fa-star-half-alt"></i> <!-- Half Star -->
                                            @else
                                                <i class="far fa-star"></i> <!-- Empty Star -->
                                            @endif
                                        @endfor
                                        <span class="product-o__review">({{ $product->rates->count() }} reviews)</span>
                                    </div>

                                    <div class="u-s-m-b-15">
                                        <div class="pd-detail__inline">

                                            <span class="pd-detail__stock">{{$product->quantity}} in stock</span>

                                            {{--                                    <span class="pd-detail__left">Only 2 left</span></div>--}}
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <span class="pd-detail__preview-desc">{{$product->description}}</span></div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">
                                            <span class="pd-detail__click-wrap">
                                                <i class="far fa-heart u-s-m-r-6"></i>
                                                <a href="#" class="toggle-favorite" data-product-id="{{ $product->id }}">
                                                    {{ $product->isFavorite ? 'Remove from Wishlist' : 'Add to Wishlist' }}
                                                </a>
                                                <span class="pd-detail__click-count">({{ $product->favorites->count() }})</span>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">

                                        <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                            <a href="signin.html">Email me When the price drops</a>

                                            <span class="pd-detail__click-count">(20)</span></span></div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <ul class="pd-social-list">
                                                <li>

                                                    <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li>

                                                    <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li>

                                                    <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a></li>
                                                <li>

                                                    <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                <li>

                                                    <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <form class="pd-detail__form"  action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">
                                                <div class="pd-detail-inline-2">

                                                    <div class="u-s-m-b-15">


                                                        @csrf <!-- Laravel CSRF protection -->
                                                        <input type="hidden" name="product_id" value="{{$product->id}}" >
                                                        <input type="hidden" name="name" value="{{$product->name}}">
                                                        <input type="hidden" name="price" value="{{$product->price}}">
                                                        <input type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}" required>


                                                        <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>




                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                            <ul class="pd-detail__policy-list">
                                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                                    <span>Buyer Protection.</span></li>
                                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                                    <span>Full Refund if you don't receive your order.</span></li>
                                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                                    <span>Returns accepted if product not as described.</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Product Right Side Details ======-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
