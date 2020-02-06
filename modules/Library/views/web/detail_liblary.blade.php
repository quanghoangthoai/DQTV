@extends('Web::layouts.' . cms_layout_view('detail_liblary', 'Library'))
@section('breadcrums')
<nav aria-label="breadcrumb" class="text-center">
    <div id="breadcrumb">
        <h1>{{ $lib->name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('executeSlug', $lib->category['slug']) }}">{{ $lib->category['name'] }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $lib->name }}</li>
        </ol>
    </div>
</nav>
@endsection
@section('page_content')
<section id="details-library">
    <article>
        <header>
            <h3>{{ $lib['name'] }}</h3>
            <div class="time-view">
                <span><i class="far fa-clock"></i> {{ date('d/m/Y', strtotime($lib['created_at'])) }}</span>
                <span><i class="far fa-eye"></i> {{ number_format($lib['view_count']) }}</span>
            </div>
        </header>
        <div class="library-contents">
            <p>
                {!!$lib['short_description'] !!}
            </p>
            <table class="table table-bordered table-sm table-xs">
                <tbody>
                    @if ($lib['document_type'] == 1 )
                    <tr>
                        <th scope="row"><i class="fas fa-book"></i>Số hiệu</th>
                        <td>{{ $lib['text_code'] }}</td>
                        <th scope="row"><i class="far fa-file-alt"></i>Loại văn bản</th>
                        @foreach ( mod_library_list_text_type() as $key => $value )
                        @if ($key == $lib['text_type'])
                        <td>{{ $value }}</td>
                        @endif
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="row"><i class="far fa-calendar-alt"></i>Ngày ban hành</th>
                        <td>{{ date('d/m/Y', strtotime($lib['issued_date'])) }}</td>
                        <th scope="row"><i class="fas fa-share-square"></i>Nơi ban hành</th>
                        <td>{{ $lib['issued_location'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row"><i class="far fa-calendar-alt"></i>Ngày hiệu lực</th>
                        <td>{{ date('d/m/Y', strtotime($lib['started_date'])) }}</td>

                        <th scope="row"><i class="far fa-check-square"></i>Tình trạng</th>

                        @if ($lib['expired_date'] >= date("Y-m-d") || $lib['expired_date'] == null )
                        <td>Còn hiệu lực</td>
                        @else
                        <td>Hết hiệu lực</td>
                        @endif
                    </tr>
                    @endif
                    <tr>
                        <th scope="row"><i class="far fa-eye"></i>Lượt xem</th>
                        <td>{{ $lib['view_count'] }}</td>
                        <th scope="row"><i class="far fa-arrow-alt-circle-down"></i>Lượt tải</th>
                        <td>{{ $lib['download_count'] }}</td>
                    </tr>
                    <tr>

                        <th scope="row"><i class="fas fa-download"></i>Tải về</th>
                        @if (auth('web')->id() == null)

                        <td colspan="3">Quý khách vui lòng <a href="javascript:;" class="p-0" data-toggle="modal" data-target="#login-apply">đăng nhập</a> để tham gia bình luận. Nếu chưa có tài khoản <a href="javascript:;" class="p-0" data-toggle="modal" data-target="#registration">đăng ký tại đây</a></td>

                        @else
                        <td colspan="3">
                            <a target="_blank" href="{{ route('mod_library.web.get_download', $lib['id']) }}"> {{ $lib['name'] }}</a>
                        </td>
                        @endif
                    </tr>
                </tbody>
            </table>
            <p>
                {!! $lib['content'] !!}
            </p>

        </div>
    </article>
</section>
<section id="comment">
    @if (module_check_active('Comment'))
    @include('Comment::admin.comment.comment')
    @endif
</section>

@endsection