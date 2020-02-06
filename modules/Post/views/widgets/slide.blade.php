<section id="news-slider">
    <div class="newsSlide">
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
            @if( count(mod_post_get_list_specific_category()))
            @foreach (mod_post_get_list_specific_category() as $key => $iSlide)
            <li class="nav-item">
                <a class="nav-link {{$key == 0 ? 'active' : ''}}" id="tab-{{$iSlide['id']}}" data-toggle="pill" href="#tab{{$iSlide['id']}}" role="tab" aria-controls="tab-1" aria-selected="true">
                    {{$iSlide['title']}}
                </a>
            </li>
            @endforeach
            @else
            {{ 'Chưa có tiêu đề nào' }}
            @endif
        </ul>
        <div class="tab-content post-main" id="pills-tabContent">
            @foreach (mod_post_get_list_specific_category() as $key => $iSlide)
            <div class="tab-pane fade show {{$key == 0 ? 'active' : ''}}" id="tab{{$iSlide['id']}}" role="tabpanel" aria-labelledby="tab-{{$iSlide['id']}}">
                <div class="owl-carousel">
                    @if($iSlide->posts)

                    @foreach ($iSlide->posts as $iPost)
                    <div class="item">
                    <a href="{{route('mod_post.web.view_category', $iSlide)}}">
                            <figure class="image">
                                <img src="{{ get_img_src($iPost['image']) }}" alt="">
                            </figure>
                        </a>
                        <div class="content">
                            <h3 class="title">
                                <a href="detail-post.html" class="item-title">{{$iPost['title']}}</a>
                            </h3>
                            <div class="time">
                                <i class="far fa-clock"></i> {{ date('d/m/Y H:i', strtotime($iPost['created_at'])) }}
                            </div>
                            <p class="desc">
                                {{$iPost['description']}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @endif


                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>