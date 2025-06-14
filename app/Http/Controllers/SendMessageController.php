<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function index(Request $request)
    {

        return view('sendmessage.index',[
            'title' => 'Kirim Pesan',
            'error' => null,
            'data'  => null,
        ]);
    }
}
