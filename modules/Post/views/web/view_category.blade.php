@extends('Web::layouts.' . cms_layout_view('view_category', 'Post'))
<style>
    #breadcrumb ol li.active a {
    color: #c61c0f !important;
}
</style>
@section('breadcrums')
<nav aria-label="breadcrumb">
    <div id="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('mod_post.web.detail_post', $category['slug']) }}"> {{ $category['title'] }}</a></li>
        </ol>
    </div>
</nav>
@endsection
@section('page_content')
<section id="list-post">
    @if($listPosts)
    @foreach($listPosts as $iCategory)
    <div class="list-item">
        <div class="row item">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                <div class="image">
                    <a href="{{route('mod_post.web.detail_post', $iCategory['slug'])}}">
                        <figure>
                            <img src="{{ get_img_src($iCategory['image']) }}" alt="" class="w-100">
                        </figure>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                <div class="content">
                    <div class="title">
                        <a href="{{route('mod_post.web.detail_post', $iCategory['slug'])}}">
                            <h3>{{$iCategory['title']}}</h3>
                        </a>
                    </div>
                    <div class="des">
                        <p class="time-view-cmt">
                            <span><i class="far fa-clock"></i> {{ date('d/m/Y H:i', strtotime($iCategory['created_at'])) }}</span>
                        </p>
                        <p class="content-detail">{{$iCategory['description']}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    {{'Đang cập nhật'}}
    @endif
    <nav aria-label="Page navigation example" class="text-center">
        {{-- <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul> --}}
        @if ($listPosts->links('vendor.pagination.bootstrap-4'))
        <div class="cms-paginate text-center">
            {{ $listPosts->links('vendor.pagination.bootstrap-4') }}
        </div>
        @endif
    </nav>

</section>
@endsection