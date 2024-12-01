@extends('layouts.userPage')
@section('content')

    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="is-marked">
                                    <a href="{{ route('user.profile') }}">My Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">
            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <!--====== Dashboard Features ======-->
                                <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                    <div class="dash__pad-1">
                                        <span class="dash__text u-s-m-b-16">
                                            Hello, {{ auth()->user()->name }}
                                        </span>
                                        <ul class="dash__f-list">
                                            <li><a class="dash-active" href="{{ route('user.profile') }}">Manage My Account</a></li>
                                            <li><a href="{{ route('user.profile') }}">My Profile</a></li>
                                            <li><a href="{{ route('user.addressBook') }}">Address Book</a></li>
                                            <li><a href="#">Track Order</a></li>
                                            <li><a href="#">My Orders</a></li>
                                            <li><a href="#">My Payment Options</a></li>
                                            <li><a href="#">My Returns & Cancellations</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                    <div class="dash__pad-1">
                                        <ul class="dash__w-list">
                                            <li>
                                                <div class="dash__w-wrap">
                                                    <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>
                                                    <span class="dash__w-text">{{ $orderCount ?? 0 }}</span>
                                                    <span class="dash__w-name">Orders Placed</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dash__w-wrap">
                                                    <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>
                                                    <span class="dash__w-text">0</span>
                                                    <span class="dash__w-name">Cancel Orders</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dash__w-wrap">
                                                    <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>
                                                    <span class="dash__w-text">0</span>
                                                    <span class="dash__w-name">Wishlist</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--====== End - Dashboard Features ======-->
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">My Profile</h1>
                                        <span class="dash__text u-s-m-b-30">Look at all your info, you can customize your profile.</span>
                                        <div class="row">
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Full Name</h2>
                                                <span class="dash__text">{{ auth()->user()->name }}</span>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>
                                                <span class="dash__text">{{ auth()->user()->email }}</span>
                                                <div class="dash__link dash__link--secondary">
                                                    <a href="#">Change</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Phone</h2>
                                                <span class="dash__text">{{ auth()->user()->phone ?? 'Please enter your mobile' }}</span>
                                                <div class="dash__link dash__link--secondary">
                                                    <a href="#">Add</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Birthday</h2>
                                                <span class="dash__text">{{ auth()->user()->birthday ?? 'Not specified' }}</span>
                                            </div>
                                            <div class="col-lg-4 u-s-m-b-30">
                                                <h2 class="dash__h2 u-s-m-b-8">Gender</h2>
                                                <span class="dash__text">{{ ucfirst(auth()->user()->gender ?? 'Not specified') }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="dash__link dash__link--secondary u-s-m-b-30">
                                                    <a href="#">Subscribe Newsletter</a>
                                                </div>
                                                <div class="u-s-m-b-16">
                                                    <a class="dash__custom-link btn--e-transparent-brand-b-2" href="#">Edit Profile</a>
                                                </div>
                                                <div>
                                                    <a class="dash__custom-link btn--e-brand-b-2" href="#">Change Password</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->
@endsection