<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeBanner;
use App;

class HomeBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
        $banners = HomeBanner::orderby('id')->get();
        return view("admin.read.homebanner", compact('banners'));
    }

    public function add() {
        return view("admin.add.homebanner");
    }

    public function edit($language, $id = null) {
        $banner = HomeBanner::findOrFail($id);
        return view("admin.edit.homebanner", compact(['banner', 'id']));
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
        } elseif($r->id) {
        } else {
            return "not a valid image!";
        }

        if($r->id) {
            $homebanner = $homebanner->toArray();
            $update = HomeBanner::where('id', $r->id)->first();
            $update->update($homebanner);  
            return redirect()->route('homeBanner.edit', ['language' => app()->getLocale(), 'id' => $r->id])->with('succes', trans('alert.edit'));
        } else {
            $homebanner->save();
            return redirect()->route('homeBanner',  app()->getLocale())->with('succes', trans('alert.add'));
        }
    }

    public function destroy($language, $id) {
        HomeBanner::find($id)->delete();
        return redirect()->route('homeBanner', app()->getLocale())->with('danger', trans('alert.delete'));
    }
}
