<?php

namespace Modules\Library\Controllers;

use Modules\Library\Models\History;
use System\Core\Controllers\WebController as Controller;

class ClientController extends Controller
{
    public function getHistoryDownload()
    {
        $data['page_title'] = 'Lịch sử tải tài liệu';
        $history_id = auth('web')->id();
        $data['listHistory'] = History::where('user_id', $history_id)->get();
        return view('Library::client.history_download', $data);
    }
    public function getDetailHistoryDownload($id)
    {
        return view('Library::client.detail_history_dowload');
    }
}