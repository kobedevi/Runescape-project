<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;


class AboutsController extends Controller
{
    public function getindex(){
        $text = About::firstOrFail();
        return view('about', compact('text'));
    }

    public function edit() {
        $post = About::firstOrFail();
        return view("admin.edit.about", compact('post'));
    }

    public function save(Request $r) {
        $about = new About();
        $about->text_en = $r->input('text_en');
        $about->text_nl = $r->input('text_nl');

        $about = $about->toArray();
        $update = About::where('id', 1)->first();
        
        $update->update($about);   

        return redirect()->route('admin', app()->getLocale());
    }
}
