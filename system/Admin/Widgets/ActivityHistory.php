<?php

namespace System\Admin\Widgets;

use Arrilot\Widgets\AbstractWidget;

class ActivityHistory extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('Admin::widgets.activity_log');
    }

    /**
     * config
     */
    public function config()
    {
        return view('Dashboard::widgets.test_config')->render();
    }
}