<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeBanner;

class HomeBannerController extends Controller
{
    public function add($lang) {
        return view("admin.add");
    }

    public function save(Request $r) {
        $homebanner = new HomeBanner();

        $homebanner->position = $r->input('position');
        $homebanner->color = $r->input('color');
        $homebanner->title_en = $r->input('title_en');
        $homebanner->text_en = $r->input('text_en');
        $homebanner->title_nl = $r->input('title_nl');
        $homebanner->text_nl = $r->input('text_nl');

        if($r->hasfile('image')) {
            $file = $r->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/banners/', $filename);
            $homebanner->image = $filename;
        } else {
            return "not a valid image!";
        }

        $homebanner->save();
        return redirect()->route('home', app()->getLocale());
    }
}
