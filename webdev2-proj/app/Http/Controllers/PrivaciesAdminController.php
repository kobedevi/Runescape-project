<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Privacy;

class PrivaciesAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit() {
        $post = Privacy::firstOrFail();
        return view("admin.edit.privacy", compact('post'));
    }

    public function save(Request $r) {
        $privacy = new Privacy();
        $privacy->text_en = $r->input('text_en');
        $privacy->text_nl = $r->input('text_nl');

        $privacy = $privacy->toArray();
        $update = Privacy::where('id', 1)->first();
        
        $update->update($privacy);   

        return redirect()->route('privacy.edit', app()->getLocale())->with('succes', trans('alert.edit'));
    }
}
