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

                                    <a href="index.html">Home</a></li>
                                <li class="is-marked">

                                    <a href="dash-address-book.html">My Account</a></li>
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
                                        <div class="dash__address-header">
                                            <h1 class="dash__h1">Address Book</h1>
                                            <div>

                                                    <span class="dash__link dash__link--black u-s-m-r-8">

                                                        <a href="dash-address-make-default.html">Make default shipping address</a></span>

                                                <span class="dash__link dash__link--black">

                                                        <a href="dash-address-make-default.html">Make default shipping address</a></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                    <div class="dash__table-2-wrap gl-scroll">
                                        <table class="dash__table-2">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Action</th>
                                                <th>city</th>
                                                <th>province</th>
                                                <th>postal_code</th>
                                                <th>Phone Number</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($addresses as $address)
                                                <tr>
                                                    <td>
                                                        <a class="address-book-edit btn--e-transparent-platinum-b-2" href="dash-address-edit.html">Edit</a></td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$address->city}}</td>
                                                    <td>{{$address->province}}</td>
                                                    <td>{{$address->postal_code}}</td>
                                                    <td>(+0) 900901904</td>

                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div>

                                    <a class="dash__custom-link btn--e-brand-b-2" href="dash-address-add.html"><i class="fas fa-plus u-s-m-r-8"></i>

                                        <span>Add New Address</span></a></div>
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
