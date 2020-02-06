@extends('Web::layouts.' . cms_layout_view('detail_page', 'Page'))
@section('breadcrums')
<nav aria-label="breadcrumb" id="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="#">Giới thiệu</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$page['title']}}</li>
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
                {{$page['title']}}
            </h1>
        </div>
        <div class="content">
                {!! $page['content'] !!}
        </div>
    </article>
</section>
@endsection