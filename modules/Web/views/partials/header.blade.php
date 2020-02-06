<header>
    <div id="top-bar">
        <div class="d-flex bd-highlight">
            <div class="flex-grow-1">
                <ul class="date">
                    <li>
                        <p id="date"></p>
                    </li>
                    <li>
                        <div id="clock">
                            <span>-</span>
                            <span class="unit" id="hours"></span><span>&nbsp:</span>
                            <span class="unit" id="minutes"></span><span>&nbsp:</span>
                            <span class="unit" id="seconds"></span><span></span>
                            <span class="unit" id="ampm"></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="menutop">
                    <li>
                        <a href="#">
                            <img src=" {{ asset('assets/web/images/viet.png')}} " alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src=" {{ asset('assets/web/images/anh.png')}} " alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">
                            <span>Đăng nhập</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="logo">
        <div class="bg">
            <div class="d-flex flex-row">
                <div class="logo-img">
                    <a href="{{ route('home') }}" title="{{ $global_config['site_name'] }}"><img src="{{ logo_src($global_config['site_logo']) }}" width="100" alt=""></a>
                </div>
                <div class="site-title align-self-center">
                    <p class="tag">{{ $global_config['site_name'] }}</p>
                    <p class="title">{{ $global_config['site_unit'] }}</p>
                </div>
            </div>
        </div>
    </div>
    @if (module_check_active('Menu'))
    @widgetGroup('MAIN_MENU')
    @endif
</header>