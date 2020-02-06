@extends('Web::layouts.' . cms_layout_view('category_liblary', 'Library'))
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

<section id="library">
    <h3 class="title text-center">
        {{ $catLib['name'] }}
    </h3>
    <div class="des">
        <p>{{ $catLib['description'] }}</p>
    </div>
    <table id="table-library" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="width: 10%;">Số</th>
                <th style="width: 60%;">Tên văn bản</th>
                <th style="width: 15%;">Ngày hiệu lực</th>
                <th style="width: 15%;">Loại văn bản</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $listLib as $iListLib )
            <tr>
                <td><a href="{{ route('executeSlug', $catLib['slug'] . "/".$iListLib['slug'] ) }}">{{ $iListLib['text_code'] }}</a></td>
                <td>{{ $iListLib['name']  }}</td>
                <td>{{ date('d/m/Y', strtotime($iListLib['started_date'])) }}</td>
                @foreach ( mod_library_list_text_type() as $key => $value )
                @if ($key == $iListLib['text_type'])
                <td>{{ $value }}</td>
                @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection