<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getIndex() {
        // get all the newsposts
        $posts = News::orderBy('id', 'DESC')->get();
        return view('admin.read.news', compact('posts'));
    }

    public function add() {
        // load view to add newspost
        return view("admin.add.news");
    }

    public function edit($language, $id = null) {
        // get newspost user wants to edit
        $post = News::findOrFail($id);
        return view("admin.edit.news", compact(['post', 'id']));
    }

    // update/save newspost
    public function save(Request $r) {
        // all the user's data
        $post = new News();

        $post->title_en = $r->input('title_en');
        $post->intro_en = $r->input('intro_en');
        $post->text_en = $r->input('text_en');
        $post->title_nl = $r->input('title_nl');
        $post->intro_nl = $r->input('intro_nl');
        $post->text_nl = $r->input('text_nl');
        $post->slug_en = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title_en)));
        $post->slug_nl = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title_nl)));

        // imagestuffsels
        if($r->hasfile('image')) {
            $file = $r->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/news/', $filename);
            $post->image = $filename;
        } elseif($r->id) {
            // if it's an existing post and there's no new image, use the old one
        } else {
            // return this if the user didn't use a valid image
            return redirect()->route('newsAdmin', app()->getLocale())->with('warning', trans('alert.image'));
        }

        // if the user is editing an existing newspost update it
        if($r->id) {
            $post = $post->toArray();
            $update = News::where('id', $r->id)->first();
            $update->update($post);
            return redirect()->route('newsAdmin.edit', ['language' => app()->getLocale(), 'id' => $r->id])->with('succes', trans('alert.edit'));
        } else {
            // else create a new newspost
            $post->save();
            return redirect()->route('newsAdmin', app()->getLocale())->with('succes', trans('alert.add'));
        }
    }
    
    public function destroy($language, $id) {
        News::findOrFail($id)->delete();
        return redirect()->route('newsAdmin', app()->getLocale())->with('danger', trans('alert.delete'));
    }
}
