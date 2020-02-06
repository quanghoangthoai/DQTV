<?php

namespace Modules\Page\Controllers;

use Modules\Page\Models\Page;
use System\Core\Controllers\WebController as SystemWebController;

class WebController extends SystemWebController
{
    public static function getDetailPage($slug)
    {
        $data['page'] = Page::Where('slug',$slug)->where('status',1)->first();
        if ($data['page']) {
            $data['page_title'] = $data['page']->title;
        return view('Page::web.detail_page', $data);
        } else {
            return abort(404); 
        }
        
       
    }   
}