<section id="row-ctNews">
    <div class="row ">
        @if(count(mod_post_get_list_ctnew_category()))
        @foreach(mod_post_get_list_ctnew_category() as $iCategory)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="d-flex h-title">
                <div class="flex-grow-1">
                <h2><span>{{$iCategory['title']}}</span></h2>
                </div>
                <div class="align-self-center">
                    <a class="read-more" href="{{route('mod_post.web.view_category', $iCategory['slug']), $iCategory['slug']}}">Xem tất cả</a>
                </div>
            </div>
            <div class="list-item post-main">
                <div class="item">
                    <a href="detail-post.html">
                        <figure class="image">
                            <img src="{{ get_img_src($iCategory['image']) }}" alt="">
                        </figure>
                    </a>
                    <div class="content">
                        <h3 class="title">
                        <a href="detail-post.html" class="item-title">{{$iCategory['title']}}</a>
                        </h3>
                        <div class="time">
                            <i class="far fa-clock"></i> {{ date('d/m/Y H:i', strtotime($iCategory['created_at'])) }}
                        </div>
                        <p class="desc">
                                {{$iCategory['description']}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</section>