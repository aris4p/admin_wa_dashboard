<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $base = config('services.wasenders.base_url');
        $resp = Http::get("{$base}/api/check-session/aris");

        if ($resp->successful()) {
            $sessionData = $resp->json();
            $error       = null;
        } else {
            Log::error('Wasenders API error', [
                'status' => $resp->status(),
                'body'   => $resp->body(),
            ]);
            $sessionData = null;
            $error       = 'Gagal terkoneksi ke Wasenders API (HTTP '.$resp->status().')';
        }
        return view('dashboard.index',[
            'title' => 'Dashboard',
            'data'  => $sessionData,
            'error' => $error,
        ]);
    }


}
