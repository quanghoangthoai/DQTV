<section id="hotNews">
    <div class="card hot-news">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-hotnews">
                    @if (isset($listHotNew) && count($listHotNew))
                    @foreach($listHotNew as $iNew)
                    <article>
                        <div class="image">
                            <a href="{{ route('mod_post.web.detail_post',$iNew['slug']) }}">
                                <figure>
                                    <a href="{{ route('mod_post.web.detail_post',$iNew['slug']) }}"><img src="{{ get_img_src($iNew['image']) }}" alt="anh"></a>
                                </figure>
                            </a>
                        </div>
                        <div class="big-title">
                            <h2><a href="{{ route('mod_post.web.detail_post',$iNew['slug']) }}">{{$iNew['title']}}</a>
                            </h2>
                            <p class="m-0">{{$iNew['description']}}</p>
                        </div>
                    </article>
                    @endforeach
                    @else
                    {{ 'Chưa có bài viết nào' }}
                    @endif
                    {{-- end --}}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-hotnews-detail">
                    <div class="listhotnews">
                        {{-- listHostnew --}}
                        @if (isset($listHotNew) && count($listHotNew))
                        @foreach($listHotNew as $iNew)
                        <ul class="m-0">
                            <li>
                                <a href="{{ route('mod_post.web.detail_post',$iNew['slug']) }}">{{$iNew['title']}}</a>
                            </li>
                        </ul>
                        @endforeach
                        @else
                        {{ 'Chưa có bài viết nào' }}
                        @endif
                        {{-- endList --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>