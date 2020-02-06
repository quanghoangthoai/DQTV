<?php

namespace Modules\Library\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Modules\Library\Models\Category as CategoryDocument;

class Category extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $data['listCategory'] = CategoryDocument::where('status', 1)->get();
        $data['name'] = 'CMS';
        return view('Library::widgets.category', $data);
    }

    /**
     * config
     */
    // public function config()
    // {
    //     return view('Dashboard::widgets.test_config')->render();
    // }
}
