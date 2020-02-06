<?php

namespace Modules\Post\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Modules\Post\Models\Post;

class Slide extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $data['name'] = 'CMS';
        $data['listSlide'] = Post::get()->sortByDesc('totalhits')->take(5);
        return view('Post::widgets.slide', $data);
    }

    /**
     * config
     */
    // public function config()
    // {
    //     return view('Dashboard::widgets.test_config')->render();
    // }
}
