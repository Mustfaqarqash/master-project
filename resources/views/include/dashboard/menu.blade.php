<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo me-1">
                <span style="color: var(--bs-primary)">
                  <img width="80" height="80" alt="" viewBox="0 0 250 196" fill="none" src="{{asset('assets/img/avatars/logo.png')}}">


                </span>
              </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">Best Deals</span>
        </a>


    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item  @yield("analytics_active" , "") ">
            <a href="{{route('analytics.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ri-home-smile-line"></i>
                <div data-i18n="Basic">Analytics</div>
            </a>
        </li>

        <!-- User -->
        @if (Auth::user()->role == 'admin')
            <li class="menu-item @yield("user_active" , "")">
                <a href="{{route('users.index')}}" class="menu-link">
                    <i class="ri-user-3-line ri-22px me-2"></i>
                    <div data-i18n="Basic">Users</div>
                </a>
            </li>
        @endif


        <li class="menu-header mt-7">
            <span class="menu-header-text">category &amp; Subs</span>
        </li>
       <!-- category -->
        @if (Auth::user()->role == 'admin')
        <li class="menu-item  @yield("category" , "")">
            <a href="{{route('category.index')}}" class="menu-link">
                <i class="ri-shopping-cart-2-line"></i>
                <div data-i18n="Basic">Category</div>
            </a>
        </li>
        @endif
       <!-- sub category -->
        @if (Auth::user()->role == 'admin')
        <li class="menu-item  @yield("subCategory" , "")">
            <a href="{{route('subCategory.index')}}" class="menu-link">
                <i class="ri-shopping-cart-2-line"></i>
                <div data-i18n="Basic">Sub Category</div>
            </a>
        </li>
        @endif

        <li class="menu-item  @yield("product" , "")">
            <a href="{{route('product.index')}}" class="menu-link">
                <i class="ri-shopping-cart-2-line"></i>
                <div data-i18n="Basic">product</div>
            </a>
        </li>

        @if (Auth::user()->role == 'admin')
            <li class="menu-header mt-7">
                <span class="menu-header-text">store</span>
            </li>
        <li class="menu-item  @yield("stores" , "")">
            <a href="{{route('stores.index')}}" class="menu-link">
                <i class="ri-shopping-cart-2-line"></i>
                <div data-i18n="Basic">Stores</div>
            </a>
        </li>
        @endif
        <li class="menu-header mt-7">
            <span class="menu-header-text">category &amp; offers</span>
        </li>
        @if (Auth::user()->role == 'admin')
        <li class="menu-item  @yield("offersCategory" , "")">
            <a href="{{route('offersCategory.index')}}" class="menu-link">
                <i class="ri-shopping-cart-2-line"></i>
                <div data-i18n="Basic">offer category</div>
            </a>
        </li>
        @endif
        <li class="menu-item  @yield("offer" , "")">
            <a href="{{route('offer.index')}}" class="menu-link">
                <i class="ri-shopping-cart-2-line"></i>
                <div data-i18n="Basic">offer</div>
            </a>
        </li>
        <li class="menu-item  @yield("offer" , "")">
            <a href="{{route('order.index')}}" class="menu-link">
                <i class="ri-shopping-cart-2-line"></i>
                <div data-i18n="Basic">order</div>
            </a>
        </li>





    </ul>
</aside>
<!-- / Menu -->
