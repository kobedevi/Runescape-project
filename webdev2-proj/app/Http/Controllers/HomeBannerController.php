<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeBanner;

class HomeBannerController extends Controller
{

    public function getIndex(){
        $banners = HomeBanner::orderby('id')->get();
        return view("admin.read.homebanner", compact('banners'));
    }

    public function add() {
        return view("admin.add.homebanner");
    }

    public function edit($language, $banner) {
        $thisbanner = HomeBanner::find($banner);
        return view("admin.edit.homebanner", compact('banner'));
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

        if($r->id) {
            dd($r->id);
            // $update = HomeBanner::where('id', $r->id)->first();
            // $update->update($homebanner);
        } else {
            dd('geen id');
            // $homebanner->save();
        }

        return redirect()->route('homeBanner', app()->getLocale());
    }

    public function destroy($banner) {
        HomeBanner::find($banner)->delete();
        return redirect()->route('homeBanner', app()->getLocale());
    }
}
