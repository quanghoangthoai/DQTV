<?php

namespace System\Core\Controllers;

class WebController extends BaseController
{
    function __construct()
    {
        parent::__construct();
        cms_load_widget();
    }
}