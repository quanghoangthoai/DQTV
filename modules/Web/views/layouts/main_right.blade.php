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
                    <div class="row">
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                            <main id="main">
                                @yield('breadcrums')
                                @yield('page_content')
                            </main>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <aside class="sidebar">
                                @widgetGroup('SIDEBAR_RIGHT')
                            </aside>
                        </div>
                    </div>
                </div>
                @include('Web::partials.footer')
            </div>
        </div>
    </div>
    @include('Web::partials.foot_script')
    @yield('custom_js')
</body>

</html>