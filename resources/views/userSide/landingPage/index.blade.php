@extends('layouts.userPage')

@section('content')
    @include('include/userPage/hero')
    <!--====== shop By Deals ======-->
    @include("userSide.landingPage.shopByDeals")
    <!--====== End - shop By Deals ======-->

    <!--====== Trending Product  ======-->
    @include("userSide.landingPage.trendingProduct")
    <!--====== End - Trending Product  ======-->
    <!--====== Section 5 ======-->
    <div class="banner-bg">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-bg__countdown">
                            <div class="countdown countdown--style-banner" data-countdown="2020/05/01"></div>
                        </div>
                        <div class="banner-bg__wrap">
                            <div class="banner-bg__text-1">

                                <span class="u-c-white">Global</span>

                                <span class="u-c-secondary">Offers</span></div>
                            <div class="banner-bg__text-2">

                                <span class="u-c-secondary">Official Launch</span>

                                <span class="u-c-white">Don't Miss!</span></div>

                            <span class="banner-bg__text-block banner-bg__text-3 u-c-secondary">Enjoy Free Shipping when you buy 2 items and above!</span>

                            <a class="banner-bg__shop-now btn--e-secondary" href="shop-side-version-2.html">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 5 ======-->

    @include("userSide.landingPage.featuerdProduct")


    <!--====== diffrent Product ======-->
    @include("userSide.landingPage.diffrentProduct")
    <!--====== End - diffrent Product ======-->


    <!--====== Section 9 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-truck"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">Free Shipping</span>

                                <span class="service__info-text-2">Free shipping on all US order or order above $200</span></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-redo"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">Shop with Confidence</span>

                                <span class="service__info-text-2">Our Protection covers your purchase from click to delivery</span></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">24/7 Help Center</span>

                                <span class="service__info-text-2">Round-the-clock assistance for a smooth shopping experience</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 9 ======-->
    <!--====== Naw ARRIVALS  ======-->
    @include("userSide.landingPage.newArrivals")
    <!--====== Naw ARRIVALS  ======-->

@endsection
