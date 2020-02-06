@extends('Web::layouts.' . cms_layout_view('detail_post', 'Post'))
@section('breadcrums')
<nav aria-label="breadcrumb" id="breadcrumbs">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mod_post.web.view_category', $post->category['slug']) }}"> {{ $post->category['title'] }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
    </ol>
    <div class="bdtop1"></div>
    <div class="bdtop2"></div>
</nav>
@endsection
@section('page_content')
<section id="detail-post">
    <article>
        <div class="title">
            <h1>
                {{ $post->title }}
            </h1>
            <div class="time">
                <i class="far fa-clock"></i> {{ date('d/m/Y H:m', strtotime($post['created_at'])) }}
            </div>
        </div>
        <div class="content">
            {!! $post['content'] !!}
        </div>
        <div class="aut">
            <b  style="float: left;"> Nguồn: {{ $post->source}} </b>
            <b> {{ $post->author}} </b>
        </div>
    </article>
</section>
<section id="hotNews" class="recent-posts">
    <div class="d-flex h-title">
        <div class="flex-grow-1">
            <h2><span>Các tin khác</span></h2>
        </div>
    </div>
    @if($different_post->count() > 0)
    @foreach($different_post as $iDifferent)
    <div class="hot-news">
        <div class="listhotnews">
            <ul class="m-0">
                <li>
                    <a href="{{route('mod_post.web.detail_post', $iDifferent['slug']), $iDifferent['title']}}">{{$iDifferent['title']}}</a>
                </li>
            </ul>
        </div>
    </div>
    @endforeach
    @else
    {{'Chua co tin khac'}}
    @endif
</section>
{{-- <section id="comment">
    @if (module_check_active('Comment'))
    @include('Comment::admin.comment.comment')
    @endif
</section> --}}

@endsection