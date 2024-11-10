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
                                    <a href="{{ route('login') }}">Signin</a>
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
            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">ALREADY REGISTERED?</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row row--center">
                        <div class="col-lg-6 col-md-8 u-s-m-b-30">
                            <div class="l-f-o">
                                <div class="l-f-o__pad-box">
                                    <h1 class="gl-h1">I'M NEW CUSTOMER</h1>
                                    <span class="gl-text u-s-m-b-30">
                                    By creating an account with our store, you will be able to move through the checkout process faster, store shipping addresses, view and track your orders in your account and more.
                                </span>
                                    <div class="u-s-m-b-15">
                                        <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="{{ route('register') }}">CREATE AN ACCOUNT</a>
                                    </div>
                                    <h1 class="gl-h1">SIGNIN</h1>
                                    <span class="gl-text u-s-m-b-30">If you have an account with us, please log in.</span>

                                    <!-- Login Form -->
                                    <form class="l-f-o__form" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Social Login Buttons -->
                                        <div class="gl-s-api">
                                            <div class="u-s-m-b-15">
                                                <a href="{{ route('auth-google') }}" class="gl-s-api__btn gl-s-api__btn--gplus">
                                                    <i class="fab fa-google"></i>
                                                    <span>Sign in with Google</span>
                                                </a>
                                            </div>
                                        </div>


                                        <!-- Email Input -->
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="login-email">E-MAIL *</label>
                                            <input class="input-text input-text--primary-style @error('email') is-invalid @enderror" type="email" id="login-email" name="email" value="{{ old('email') }}" required placeholder="Enter E-mail">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <!-- Password Input -->
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="login-password">PASSWORD *</label>
                                            <input class="input-text input-text--primary-style @error('password') is-invalid @enderror" type="password" id="login-password" name="password" required placeholder="Enter Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <!-- Login Button and "Lost Password" Link -->
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <a class="gl-link" href="{{ route('password.request') }}">Lost Your Password?</a>
                                            </div>
                                        </div>

                                        <!-- Remember Me Checkbox -->
                                        <div class="u-s-m-b-30">
                                            <div class="check-box">
                                                <input type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <div class="check-box__state check-box__state--primary">
                                                    <label class="check-box__label" for="remember-me">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End of Login Form -->

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
