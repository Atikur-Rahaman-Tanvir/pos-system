
    <nav class="sidebar dark_sidebar">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo" href="{{ asset('assets') }}/index-2.html"><img
                    src="{{ asset('assets') }}/img/logo_white.png" alt=""></a>
            <a class="small_logo" href="{{ asset('assets') }}/index-2.html"><img
                    src="{{ asset('assets') }}/img/mini_logo.png" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="">
                <a class="has-arrow" href="{{ asset('assets') }}/#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets') }}/img/menu-icon/1.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Dashboard </span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{ asset('assets') }}/index-2.html">Dark Sidebar</a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{route('admin.pos.index')}}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets') }}/img/menu-icon/2.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>POS</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.category.index')}}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets') }}/img/menu-icon/2.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Category</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.product.index')}}" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets') }}/img/menu-icon/2.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Products</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ asset('assets') }}/buy_sell.html" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets') }}/img/menu-icon/3.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Buy & Sell</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ asset('assets') }}/Trader_Profile.html" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets') }}/img/menu-icon/4.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Trader Profile</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a href="{{ asset('assets') }}/crypto_stats.html" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets') }}/img/menu-icon/5.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Crypto Stats</span>
                    </div>
                </a>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="true">
                    <div class="nav_icon_small">
                        <img src="{{ asset('assets') }}/img/menu-icon/8.svg" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Apps </span>
                    </div>
                </a>
                <ul>
                    <li><a href="{{url('test')}}">Editor</a></li>

                </ul>

        </ul>
    </nav>
