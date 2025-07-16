<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Schedule;
use App\Models\Speaker;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = [
            'npage' => 0,
            'callforpaper' => Link::where('type', '1')->where('status', '1')->orderBy('lft', 'asc')->get(),
            'schedules' => Schedule::where('status', '1')->orderBy('lft', 'asc')->get(),
            'opening' => Speaker::where('active', '1')->where('type', '1')->orderBy('lft', 'asc')->get(),
            'speakers' => Speaker::where('active', '1')->where('type', '2')->orderBy('lft', 'asc')->get(),
            'welcoming' => Speaker::where('active', '1')->where('type', '3')->orderBy('lft', 'asc')->get(),
        ];

        return view('main', $data);
    }
}
