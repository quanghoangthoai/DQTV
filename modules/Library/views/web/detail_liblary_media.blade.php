@extends('Web::layouts.' . cms_layout_view('detail_liblary_media', 'Library'))
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

<section id="details-library" class="media">
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
            @if(empty($lib['video_url']))
            @if (auth('web')->id() == null)

            <td colspan="3">Quý khách vui lòng <a href="javascript:;" class="p-0" data-toggle="modal" data-target="#login-apply">đăng nhập</a> để tham gia bình luận. Nếu chưa có tài khoản <a href="javascript:;" class="p-0" data-toggle="modal" data-target="#registration">đăng ký tại đây</a></td>

            @else
            <td colspan="3"><a href="{{ $lib['attach_file'] }}" download>{{ $lib['name'] }}</a></td>

            <h6>
                @if ($lib['attach_file'])
                <i class="fas fa-download"></i> Tải về: <a href="{{ $lib['attach_file'] }}" download>{{ $lib['name'] }}</a>
                @else
                <i class="fas fa-download"></i> Tải về: <a href="#">{{ $lib['name'] }}</a>
                @endif

            </h6>
            @endif
            @else
            <iframe width="100%" height="500" src="{{ $lib['video_url'] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @endif
            {!! $lib['content'] !!}

        </div>
    </article>
</section>
<section id="comment">
    @if (module_check_active('Comment'))
    @include('Comment::admin.comment.comment')
    @endif
</section>

@endsection