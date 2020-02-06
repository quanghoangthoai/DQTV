@extends('Client::layouts.default')
@section('page_content')
<main id="main">
    <div id="content" role="main" class="content-area">
        <div class="container">
            <section id="library">
                <h3 class="title">Lịch sử tải tài liệu</h3>
                <table id="dtBasicExample" class="table " cellspacing="0" width="100%">
                    <thead>
                        <tr class="text-center">
                            <th class="th-sm" style="width: 40%;">Tên tài liệu</th>
                            <th class="th-sm">Loại văn bản</th>
                            <th class="th-sm">Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listHistory as $iList)
                        <td>
                            <a href="{{ route('executeSlug', $iList->document->category['slug'] . '/' . $iList->document['slug']) }}">{{ $iList->document['name'] }}</a>
                        </td>
                        <td class="text-center">
                            {{ mod_library_get_document_type($iList->document['document_type'])['name'] }}
                        </td>
                        <td class="text-center">
                            {{ $iList['download_time'] }}
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</main>
@endsection