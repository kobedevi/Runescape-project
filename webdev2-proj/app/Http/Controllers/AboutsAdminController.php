<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutsAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit() {
        $post = About::firstOrFail();
        return view("admin.edit.about", compact('post'));
    }

    public function save(Request $r) {
        // user data
        $about = new About();
        $about->text_en = $r->input('text_en');
        $about->text_nl = $r->input('text_nl');

        $about = $about->toArray();
        $update = About::where('id', 1)->first();
        
        // update the old content
        $update->update($about);   

        return redirect()->route('about.edit', app()->getLocale())->with('succes', trans('alert.edit'));
    }
}