<?php

use Modules\Post\Models\Category;

function mod_post_list_category($parent_id = 0, $prefix = '')
{
    $list_category = Category::where('parent_id', $parent_id)->orderBy('order', 'asc')->get()->toArray();
    $result = [];
    foreach ($list_category as $iCategory) {
        $iCategory['prefix'] = $prefix;
        array_push($result, $iCategory);
        $result = array_merge($result, mod_post_list_category($iCategory['id'], $prefix . '------ '));
    }
    return $result;
}

function mod_post_delete_category($id)
{
    $category = Category::find($id);
    if ($category) {
        if ($category->children()->count()) {
            $children_cat = $category->children;
            foreach ($children_cat as $childcat) {
                mod_post_delete_category($childcat['id']);
            }
        }
        if ($category->posts()->count()) {
            $posts = $category->posts;
            foreach ($posts as $post) {
                $post->delete();
            }
        }
        $category->delete();
    }
    return true;
}

function mod_post_get_list_specific_category(){
    $arrCheck = [
            'quan-ly-chi-dao',
            'doi-ngoai-quoc-phong',
            'chinh-sach-quoc-phong'
    ];
    $data = Category::WhereIn('slug', $arrCheck)->get();
    return $data;
}

function mod_post_get_list_ctnew_category(){
    $arrCheck = [
            'tin-hoat-dong',
            'dao-tao',
            'nghien-cuu-khoa-hoc',
            'van-hoa-the-thao'
    ];
    $data = Category::WhereIn('slug', $arrCheck)->get();
    return $data;
}