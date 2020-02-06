<?php

namespace Modules\Post\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Modules\Post\Models\Category as CategoryPost;

class CtNew extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $data['listCtnew'] = CategoryPost::get();
        $data['name'] = 'CMS';
        return view('Post::widgets.ct_new', $data);
    }

    /**
     * config
     */
    // public function config()
    // {
    //     return view('Dashboard::widgets.test_config')->render();
    // }
}
