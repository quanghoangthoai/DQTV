<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ isset($page_title) ? $page_title : $global_config['site_name'] }}</title>
    @include('Web::partials.head_link')
    @yield('custom_css')
</head>

<body>
    <div id="wrapper">
        <div class="container">
            <div class="box">
                @include('Web::partials.header')
                <div class="bg-body">
                    <main id="main">
                        @yield('breadcrums')
                        @yield('page_content')
                    </main>
                </div>

                @include('Web::partials.footer')
                <a id="button-top"><i class="fas fa-arrow-up"></i></a>
            </div>
        </div>
    </div>

    @include('Web::partials.foot_script')
    @yield('custom_js')
</body>

</html>