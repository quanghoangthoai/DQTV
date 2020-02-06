<?php

use File as File;

function get_img_src($img_path = '')
{
    if (empty($img_path)) return asset('no-img.jpg');
    if (File::exists(public_path($img_path))) return asset($img_path);
    return asset('no-img.jpg');
}

function logo_src($img_path = '')
{
    if (empty($img_path)) return asset('assets/web/images/emc-logo-big.png');
    if (File::exists(public_path($img_path))) return asset($img_path);
    return asset('assets/web/images/emc-logo-big.png');
}

function web_layouts()
{
    return ['main', 'main_right', 'home'];
}