<style>
    #s-noibat .list-item ul {
    /* padding-right: 0; */
    padding: 0;
}


#s-noibat .list-item ul li {
    list-style: none;
    line-height: 16px;
    margin-bottom: 5px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #ccc;
}
#s-noibat .list-item:last-child ul li {
    border-bottom: none;
    margin-bottom: 0px;
    padding-bottom: 0px;
}
#s-noibat .list-item ul li a {
    font-size: 13px;
    color: color: #00285a;
    color: #00285a;
    font-weight: 400;
    /* line-height: 12px; */
    /* line-height: 16px !important; */
}
aside#s-noibat {
    padding-top: 10px;
}

</style>
<aside id="s-noibat">
    <div class="d-flex h-title">
        <div class="flex-grow-1">
            <h2><span>TIÊU ĐIỂM</span></h2>
        </div>
    </div>
    @if(isset($listFocus))
    @foreach($listFocus as $iFocus)
    <div class="list-item">
        <ul>
            <li>
            <a href="{{route('mod_post.web.detail_post', $iFocus['slug'])}}">{{$iFocus['title']}}</a>
            </li>
        </ul>
    </div>
    @endforeach
    @endif
</aside>