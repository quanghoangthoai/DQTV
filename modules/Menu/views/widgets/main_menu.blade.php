<div class="navbar-menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler navbar-toggler navbar-toggler-menu_icon" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-border navbar-border1"></span>
            <span class="navbar-border navbar-border2"></span>
            <span class="navbar-border navbar-border3"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
                </li>
                @foreach ($parents as $parent)

                <li class="nav-item dropdown">
                    <a id="navbarDropdownMenuLink" href="{{ $parent['link'] }}" {{ $parent->children()->count() > 0 ? 'data-toggle=dropdown aria-haspopup=true aria-expanded=false' : '' }} class="nav-link {{ $parent->children()->count() > 0 ? 'dropdown-toggle' : '' }} text-uppercase">{{ $parent['title'] }}</a>
                    @if ($parent->children()->count())
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($parent->children as $child)
                        <a class="dropdown-item" href="/{{ $child['link'] }}"> {{ $child['target'] ? 'target=' . $child['target'] : '' }} {{ $child['title'] }}</a>
                        @endforeach
                    </div>
                    @endif
                </li>
                @endforeach
            </ul>

            <button style="background-color: transparent; border-color: transparent;" class="btn btn-secondary btn-search-close" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-search"></i>
            </button>
            <div class="collapse " id="collapseExample">
                <form class="form-search" method="get" action="" id="siteformsearch">
                    <div class="input-group">
                        <input type="text" class="form-control" autofocus placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-search "><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>

</div>