<?php

$listCat = mod_post_list_category();
$arrItem = [];
foreach ($listCat as $cat) {
    $arrItem[] = [
        'title' => $cat['title'],
        'link' => 'danh-muc/' . $cat['slug']
    ];
    if (isset($cat['subcat']) && count($cat['subcat']) > 0) {
        foreach ($cat['subcat'] as $scat) {
            $arrItem[] = [
                'title' => $scat['title'],
                'link' => 'danh-muc/' . $scat['slug']
            ];
        }
    }
}

return $arrItem;