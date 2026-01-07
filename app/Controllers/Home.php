<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data_judul = [
            'title' => 'Home'
        ];

        return view('home', $data_judul);

    }

    
}