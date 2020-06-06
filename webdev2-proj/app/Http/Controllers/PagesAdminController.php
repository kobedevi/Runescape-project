<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
        $posts = Page::orderBy('id', 'DESC')->get();
        return view('admin.read.pages', compact('posts'));
    }

    public function getCreatePage(){
        return view("admin.add.pages");
    }

    public function postCreatePage(Request $r){        
        $post = new Page();

        $post->slug_en = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $r->title_en)));
        $post->slug_nl = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $r->title_nl)));
        $post->title_en = $r->input('title_en');
        $post->title_nl = $r->input('title_nl');
        $post->intro_en = $r->input('intro_en');
        $post->intro_nl = $r->input('intro_nl');
        $post->text_en = $r->input('text_en');
        $post->text_nl = $r->input('text_nl');
        $post->active = $r->input('active');

        if($r->id) {
            $post = $post->toArray();
            $update = Page::where('id', $r->id)->first();
            $update->update($post);
            return redirect()->route('pages.edit', ['language' => app()->getLocale(), 'id' => $r->id])->with('succes', trans('alert.edit'));
        } else {
            $post->save();
            return redirect()->route('pages.index', app()->getLocale())->with('succes', trans('alert.add'));
        }
    }

    public function getEditPage($lang, $id = null){
        $post = Page::where('id', $id)->firstOrFail();
        return view('admin.edit.pages', compact('post', 'id'));
    }

    public function destroyPage($language, $id) {
        Page::find($id)->delete();
        return redirect()->route('pages.index', app()->getLocale())->with('danger', trans('alert.delete'));
    }
}
