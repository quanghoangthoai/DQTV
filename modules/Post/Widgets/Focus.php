<?php

namespace Modules\Post\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Modules\Post\Models\Post;

class Focus extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $data['name'] = 'CMS';
        $data['listFocus'] = Post::where('featured', 1)->orderBy('created_at','desc')->limit(5)->get();
        return view('Post::widgets.focus', $data);
    }

    /**
     * config
     */
    // public function config()
    // {
    //     return view('Dashboard::widgets.test_config')->render();
    // }
}