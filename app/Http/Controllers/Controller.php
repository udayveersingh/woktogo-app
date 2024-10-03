<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function goBack()
    {
        return redirect()->to(url()->previous());
    }
}


