<?php

namespace Modules\Menu\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Modules\Menu\Models\Menu;
use Modules\Menu\Models\Menuitem;

class MainMenu extends AbstractWidget
{
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        // $data['listMenu'] = Menu::get();  

        $data['parents'] = Menuitem::where('menu_id', 1)->where('parent_id', 0)->where('status', 1)->orderBy('order', 'asc')->get();
        return view('Menu::widgets.main_menu', $data);
    }

    /**
     * config
     */
    public function config()
    {
        // return view('Dashboard::widgets.test_config')->render();
    }
}