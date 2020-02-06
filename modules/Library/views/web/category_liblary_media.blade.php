@extends('Web::layouts.' . cms_layout_view('category_liblary_media', 'Library'))
@section('breadcrums')
<nav aria-label="breadcrumb" class="text-center">
    <div id="breadcrumb">
        <h1>{{ $catLib->name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $catLib->name }}</li>
        </ol>
    </div>
</nav>
@endsection
@section('page_content')
<section id="blog-bottom" class="media">
    <div class="most-read" style="display:block;width:100%">
        @foreach ($listLib as $iListLib )
        @if ( $iListLib['status']==1)
        <article class="row-most-read">
            <div class="image">
                <figure class="image-mread">
                    <a href="{{ route('executeSlug', $catLib['slug'] . "/".$iListLib['slug'] ) }}"><img src="{{ get_img_src($iListLib['image']) }}" alt="{{ $catLib['name'] }}"></a>
                </figure>
            </div>
            <div class=" content">
                <div class="mread">
                    <div class="title-mread">
                        <h5>
                            <a href="{{ route('executeSlug', $catLib['slug'] . "/".$iListLib['slug'] ) }}">{{ $iListLib['name'] }}</a>
                        </h5>
                    </div>
                    <div class="timeview">
                        <span><i class="far fa-clock"></i> {{ date('d/m/Y', strtotime($iListLib['created_at'])) }}</span>
                        <span><i class="far fa-eye"></i> {{ number_format($iListLib['view_count']) }}</span>
                    </div>
                    <div class="description">
                        {!! $iListLib['short_description'] !!}
                    </div>

                </div>
            </div>
        </article>
        @endif
        @endforeach
        {{ $listLib->links() }}
    </div>
</section>

@endsection