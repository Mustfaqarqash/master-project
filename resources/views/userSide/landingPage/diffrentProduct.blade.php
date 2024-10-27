<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                    <a class="promotion" href="shop-side-version-2.html">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img promotion__img" src="{{asset('assets/asset/images/promo/promo-img-1.jpg')}}" alt=""></div>
                        <div class="promotion__content">
                            <div class="promotion__text-wrap">
                                <div class="promotion__text-1">

                                    <span class="u-c-secondary">ACCESSORIES FOR YOUR EVERYDAY</span></div>
                                <div class="promotion__text-2">

                                    <span class="u-c-secondary">GET IN</span>

                                    <span class="u-c-brand">TOUCH</span></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                    <a class="promotion" href="shop-side-version-2.html">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img promotion__img" src="{{asset('assets/asset/images/promo/promo-img-2.jpg')}}" alt=""></div>
                        <div class="promotion__content">
                            <div class="promotion__text-wrap">
                                <div class="promotion__text-1">

                                    <span class="u-c-secondary">SMARTPHONE</span>

                                    <span class="u-c-brand">2019</span></div>
                                <div class="promotion__text-2">

                                    <span class="u-c-secondary">NEW ARRIVALS</span></div>
                            </div>
                        </div>
                    </a></div>
                <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                    <a class="promotion" href="shop-side-version-2.html">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img promotion__img" src="{{asset('assets/asset/images/promo/promo-img-3.jpg')}}" alt=""></div>
                        <div class="promotion__content">
                            <div class="promotion__text-wrap">
                                <div class="promotion__text-1">

                                    <span class="u-c-secondary">DSLR FOR NEW GENERATION</span></div>
                                <div class="promotion__text-2">

                                    <span class="u-c-brand">GET UP TO 10% OFF</span></div>
                            </div>
                        </div>
                    </a></div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== Section 8 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">

                <!-- Loop for displaying different categories -->
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                        <div class="column-product">

                            <span class="column-product__title u-c-secondary u-s-m-b-25">{{ strtoupper($category->name) }} PRODUCTS</span>
                            <ul class="column-product__list">
                                @foreach ($category->products->take(4) as $product) <!-- Limit to 4 products per category -->
                                <li class="column-product__item">
                                    <div class="product-l">
                                        <div class="product-l__img-wrap">
                                            <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="{{ route('productDetails', $product->id) }}">
                                                <img class="aspect__img" src="{{ asset('storage/' . $product->image->path) }}" alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                        <div class="product-l__info-wrap">
                                        <span class="product-l__category">
                                            <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                                        </span>
                                            <span class="product-l__name">
                                            <a href="{{ route('productDetails', $product->id) }}">{{ $product->name }}</a>
                                        </span>
                                            <span class="product-l__price">${{ $product->price }}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 8 ======-->
