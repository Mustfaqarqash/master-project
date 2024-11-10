@extends('layouts.userPage')

@section('content')
    <div class="app-content">
        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="is-marked">
                                    <a href="{{ route('register') }}">Signup</a>
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
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row row--center">
                        <div class="col-lg-6 col-md-8 u-s-m-b-30">
                            <div class="l-f-o">
                                <div class="l-f-o__pad-box">
                                    <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                                    <form method="POST" action="{{ route('register') }}" class="l-f-o__form">
                                        @csrf

                                        <div class="gl-s-api">
                                            <div class="u-s-m-b-15">
                                                <button class="gl-s-api__btn gl-s-api__btn--fb" type="button">
                                                    <i class="fab fa-facebook-f"></i> <span>Signup with Facebook</span>
                                                </button>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button">
                                                    <i class="fab fa-google"></i> <span>Signup with Google</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="name">Name *</label>
                                            <input id="name" type="text" class="input-text input-text--primary-style @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-email">E-MAIL *</label>
                                            <input id="email" type="email" class="input-text input-text--primary-style @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-password">PASSWORD *</label>
                                            <input id="password" type="password" class="input-text input-text--primary-style @error('password') is-invalid @enderror" name="password" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="password-confirm">CONFIRM PASSWORD *</label>
                                            <input id="password-confirm" type="password" class="input-text input-text--primary-style" name="password_confirmation" required>
                                        </div>

                                        <div class="u-s-m-b-15">
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE</button>
                                        </div>

                                        <a class="gl-link" href="{{ url('/') }}">Return to Store</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 2 ======-->
    </div>
@endsection
