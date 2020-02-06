<?php

use Modules\Page\Models\Page;

$data = Page::all();
$arrItem = [];
foreach ($data as $item) {
    $arrItem[] = [
        'title' => $item['title'],
        'link' => $item['slug'],
    ];
}

return $arrItem;