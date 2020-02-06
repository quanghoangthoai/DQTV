<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="{{ asset('assets/web/images/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/normalize.css')}}">
    <link rel='stylesheet' href="{{ asset('assets/web/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/carousel.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slider.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/gata.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/active.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/reponsive_25.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style_26.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript" src="{{ asset('assets/web/js/jquery.js')}}"></script>
</head>

<body>
    <div id="wrapper">
        <main id="main-login">
            <div id="loginForm-wrap" class="container">
                <div id="document-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 loginForm-page">
                            <section class="loginForm-content">
                                <form class="login100-form validate-form" action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="cardCont text-center">
                                        @if (module_check_active('Web'))
                                        <a href="{{ route('home') }}" title="Trang chủ"><img src="{{ asset('assets/web/images/logo.png') }}" alt="logo" class="login-img m-bot"></a>
                                        @else
                                        <a title="Trang chủ"><img src="{{ asset('assets/web/images/logo.png') }}" alt="logo" class="login-img m-bot"></a>
                                        @endif
                                        <div class="loginForm-title AllPage-title">
                                            ĐĂNG NHẬP
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user icon"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control check-value" name="email" placeholder="Tên đăng nhập hoặc email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-key icon"></i></span>
                                                    </div>
                                                    <input type="password" name="password" class="form-control check-value" placeholder="Mật khẩu">
                                                </div>
                                            </div>
                                            <div class="form-group form-check">
                                                <input class="form-check-input" type="checkbox" name="is_remember" value="1" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Ghi nhớ mật khẩu.
                                                </label>
                                            </div>
                                            @include('User::web.errors')
                                            <div class="button-group-contact m-bot">
                                                <button type="submit" class="btn btn-info btnAllGroup btnGruopReg btnSubmit" value="Submit">Đăng nhập</button>
                                            </div>

                                            {{-- <div class="form-group next-pagi">
                                                <a href="{{ route('forgot_password') }}" class="modal-footer-backup"><i class="fas fa-caret-right icon"></i>Quên mật khẩu đăng nhập</a>
                                        </div> --}}
                                    </div>
                        </div>

                        </form>
                        </section>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
    </div>
    </div>
    <script type="text/javascript" src=' {{ asset('assets/web/js/slick.js')}} '></script>
    <script type="text/javascript" src=" {{ asset('assets/web/js/carousel.js')}} "></script>
    <script type="text/javascript" src=" {{ asset('assets/web/js/appjs.js')}} "></script>
    <script type="text/javascript" src=" {{ asset('assets/web/js/script.js')}} "></script>
    <script type="text/javascript" src=" {{ asset('assets/web/js/bootstrap.js')}} "></script>
    <script type="text/javascript" src=" {{ asset('assets/web/js/capcha.js')}}"></script>
    <script type="text/javascript" src=" {{ asset('assets/web/js/realtime.js')}} "></script>
    <script type="text/javascript" src=" {{ asset('assets/web/js/jqueryui.js')}} "></script>
    <script type="text/javascript" src=" {{ asset('assets/web/js/popper.js')}} "></script>


    @if(session('flash_data'))
    @php
    $flash_data = session('flash_data');
    @endphp
    <script>
        $(document).ready(()=>{
            setTimeout(() => {
                alert("{{ $flash_data['message'] }}");
            }, 300);
        });
    </script>
    @endif
</body>

</html>