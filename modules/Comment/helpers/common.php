<?php

use Illuminate\Support\Str;
use Modules\Comment\Models\CommentModule;
use Modules\Comment\Models\Comment;
use Modules\User\Models\User;
use System\Core\Models\Module;

if (!function_exists('mod_comment_get_module_id')) {
    function mod_comment_get_module_id($name_module)
    {
        $list_mod = CommentModule::where('status', 1)->get();
        $module_id = null;
        if ($list_mod != null && count($list_mod)) {
            foreach ($list_mod as $iMod) {
                if ($iMod['name'] == $name_module) {
                    $module_id = $iMod['id'];
                }
            }
        }
        if ($module_id != null) {
            return $module_id;
        }
        return null;
    }
}

if (!function_exists('mod_comment_get_module_class')) {
    function mod_comment_get_module_class($id)
    {
        $data = CommentModule::where('id', $id)->first();
        if (isset($data)) {
            return $data->name;
        }
        return '';
    }
}

if (!function_exists('mod_comment_get_check_comment')) {
    function mod_comment_get_check_comment($name_module)
    {
        $list_mod = CommentModule::where('status', 1)->get();
        $check_comment = false;
        if ($list_mod != null && count($list_mod)) {
            foreach ($list_mod as $iMod) {
                if ($iMod['name'] == $name_module) {
                    $check_comment = true;
                }
            }
        }
        if ($check_comment == true) {
            return true;;
        }
        return false;
    }
}


if (!function_exists('mod_comment_get_content_comment')) {
    function mod_comment_get_content_comment($id, $module_id)
    {
        $data['comments'] = Comment::where('post_id', $id)->where('module_id', $module_id)->orderBy('created_at', 'desc')->get();
        return $data['comments'];
    }
}

if (!function_exists('mod_comment_get_list_module_comment_active')) {
    function mod_comment_get_list_module_comment_active()
    {
        $arr_mod = [];
        $list_mod = CommentModule::where('status', 1)->get();
        foreach ($list_mod as $iMod) {
            $arr_mod[] = $iMod['name'];
        }

        return $arr_mod;
    }
}


if (!function_exists('mod_comment_get_data_comment')) {
    function mod_comment_get_data_comment($id, $module)
    {
        $data['link'] = base64_encode(url()->current());
        $data['module_id'] = mod_comment_get_module_id($module);
        $data['module'] = $module;
        $data['id_detail_module'] = $id;
        $data['check_comment'] = mod_comment_get_check_comment($module);
        $data['comments'] = mod_comment_get_content_comment($id, $data['module_id']);
        return $data;
    }
}

if (!function_exists('mod_comment_get_name_role_comment')) {
    function mod_comment_get_name_role_comment($user_id)
    {
        $user = User::find($user_id);
        if ($user->hasRole('customer')) {
            return true;
        }
        return false;
    }
}

if (!function_exists('mod_comment_get_character_name_comment')) {
    function mod_comment_get_character_name_comment($name)
    {
        $arr_name = explode(" ", $name);
        $length = count($arr_name);
        $name = $arr_name[$length - 1];
        return strtoupper(mb_substr($name, 0, 1, 'UTF-8'));
    }
}

if (!function_exists('mod_comment_get_title_module')) {
    function mod_comment_get_title_module($name)
    {
        $data = Module::where('name', $name)->first();
        return $data['title'];
    }
}
