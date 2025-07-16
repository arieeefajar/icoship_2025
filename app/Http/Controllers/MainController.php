<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Link;
use App\Models\Page;
use App\Models\Panel;
use App\Models\Schedule;
use App\Models\Speaker;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        if (request()->input('page') == '') {
            $data = [
                'npage' => 0,
                'callforpaper' => Link::where('type', '1')->where('status', '1')->orderBy('lft', 'asc')->get(),
                'schedules' => Schedule::where('status', '1')->orderBy('lft', 'asc')->get(),
                'opening' => Speaker::where('active', '1')->where('type', '1')->orderBy('lft', 'asc')->get(),
                'speakers' => Speaker::where('active', '1')->where('type', '2')->orderBy('lft', 'asc')->get(),
                'welcoming' => Speaker::where('active', '1')->where('type', '3')->orderBy('lft', 'asc')->get(),
            ];

            return view('main', $data);
        } elseif (request()->input('page') == 'welcome') {
            return $this->welcome();
        } elseif (request()->input('page') == 'download') {
            return $this->download();
        } elseif (request()->input('page') == 'presentation-schedule') {
            return $this->presentation_schedule();
        } else {
            return $this->pages(request()->input('page'));
        }
    }

    public function pages($slug)
    {
        $pages = Page::where('slug', $slug)->where('active', '1')->first();
        $npage = 1;

        if ($pages != null) {
            $page = ['title' => $pages->title, 'content' => $pages->content];

            return view('page', compact('page', 'npage'));
        } else {
            abort(404);
        }
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function presentation_schedule()
    {
        $page = ['title' => 'Presentation Schedule'];
        $npage = 2;
        $panels = Panel::where('active', 1)->get();

        return view('presentation_schedule', compact('page', 'npage', 'panels'));
    }

    public function download()
    {
        $page = ['title' => 'Download'];
        $npage = 4;
        $downloads = Download::where('active', 1)->orderBy('lft', 'asc')->get();
        return view('download', compact('page', 'npage', 'downloads'));
    }
}
