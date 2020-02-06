<?php

namespace Modules\Post\Controllers;

use Modules\Post\Models\Category;
use Modules\Post\Models\Post;
use System\Core\Controllers\WebController as SystemWebController;

class WebController extends SystemWebController
{
    public function getMainPost()
    {
        return redirect()->route('home');
    }

    public function getDetailPost($slug)
    {
        $data['post'] = Post::where('slug', $slug)->where('status', 1)->first();
        // dd($data['post']);
        if ($data['post']) {
            $category_id = $data['post']->category->id;
            $data['different_post'] = Post::where('category_id', $category_id)->where('id', '<>', $data['post']->id)->orderBy('id', 'desc')->limit(10)->get();
            $data['page_title'] = $data['post']['title'];
            Post::where('id', $data['post']->id)->update(['totalhits' => $data['post']->totalhits + 1]);
            return view('Post::web.detail_post', $data);
        } else {
            return abort(404);
        }
    }

    public static function viewCategory($slug)
    {
        $data['category'] = Category::where('slug', $slug)->first();
        $data['listPosts'] = Post::where('category_id', $data['category']->id)->where('status', 1)->orderBy('id', 'desc')->paginate(10);
        if ($data['category']) {
            $data['page_title'] = $data['category']->title;
            return view('Post::web.view_category', $data);
        } else {
            return abort(404);
        }
    }
    public function getHome()
    {
        // return 'lisst';
        return view('Post::web.home_page');
    }
}
