<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoreInfoController extends Controller
{
    public function privacyView()
    {
        return view('more-info.privacy');
    }

    public function voorwaardenView()
    {
        return view('more-info.voorwaarden');
    }
}
