<div class="widget categories">
    <h3><span>THƯ VIỆN EMC</span></h3>
    <ul class="list-item">
        @if (isset($listCategory) && count($listCategory))
        @foreach ($listCategory as $iCat)
        <li class="item">
            <a href="{{ URL::to('/').'/'.$iCat['slug'] }}">
                <i class="far fa-file-alt"></i> {{ $iCat['name'] }} ({{ count($iCat->document) }})
            </a>
        </li>
        @endforeach
        @else
        {{ 'Chưa có danh mục thư viện' }}
        @endif
    </ul>
</div>