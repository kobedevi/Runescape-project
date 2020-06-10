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
        // get all the banners
        $banners = HomeBanner::orderby('id')->get();
        return view("admin.read.homebanner", compact('banners'));
    }

    public function add() {
        // add a banner
        return view("admin.add.homebanner");
    }

    public function edit($language, $id = null) {
        // eddit a banner
        $banner = HomeBanner::findOrFail($id);
        return view("admin.edit.homebanner", compact(['banner', 'id']));
    }

    // save/update banner
    public function save(Request $r) {
        // all the requested data
        $homebanner = new HomeBanner();

        $homebanner->position = $r->input('position');
        $homebanner->color = $r->input('color');
        $homebanner->title_en = $r->input('title_en');
        $homebanner->text_en = $r->input('text_en');
        $homebanner->title_nl = $r->input('title_nl');
        $homebanner->text_nl = $r->input('text_nl');

        // do image stuff
        if($r->hasfile('image')) {
            $file = $r->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/banners/', $filename);
            $homebanner->image = $filename;
        } elseif($r->id) {
            // if there's already an image, skip and use the old image
        } else {
            return "not a valid image!";
        }

        // if the user is editing an existing banner do this
        if($r->id) {
            $homebanner = $homebanner->toArray();
            $update = HomeBanner::where('id', $r->id)->first();
            $update->update($homebanner);  
            return redirect()->route('homeBanner.edit', ['language' => app()->getLocale(), 'id' => $r->id])->with('succes', trans('alert.edit'));
        } else {
            // otherwise create a new banner
            $homebanner->save();
            return redirect()->route('homeBanner',  app()->getLocale())->with('succes', trans('alert.add'));
        }
    }

    public function destroy($language, $id) {
        HomeBanner::find($id)->delete();
        return redirect()->route('homeBanner', app()->getLocale())->with('danger', trans('alert.delete'));
    }
}
