<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter as Key;

class NewsletterAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
        $keys = Key::get();
        return view('admin.read.newsletter', compact('keys'));
    }

    public function create(){
        return view('admin.add.newsletter');
    }

    public function edit($lang, $id=null){
        $key = Key::where('id', $id)->firstOrFail();
        return view('admin.edit.newsletter', compact(['key', 'id']));
    }

    public function save(Request $r){
        $newkey = new Key();
        $newkey->key = $r->key;
        $newkey->active = ($r->active=='on' ? '1' : '0');

        // if set to active set old active key to inactive
        if($newkey->active == 1){
            $oldkey = new Key();
            $oldkey->active = 0;
            $oldkey = $oldkey->toArray();
            $update = Key::where('active', "1")->firstOrFail();
            $update->update($oldkey);
        }

        if($r->id){
            $newkey = $newkey->toArray();
            $update = Key::where('id', $r->id)->first();
            $update->update($newkey);
        } else{
            $newkey->save();
        }
        return redirect()->route('newsletter.index',app()->getLocale())->with('succes', trans('alert.add'));
    }

    public function update(Request $r){
        $oldkey = new Key();

        $oldkey->active = 0;
        $oldkey = $oldkey->toArray();
        $update = Key::where('active', "1")->firstOrFail();
        $update->update($oldkey);

        $newkey = new Key();
        $newkey->active = 1;
        $newkey = $newkey->toArray();
        $update = Key::where('id', $r->active)->firstOrFail();
        $update->update($newkey);

        return redirect()->route('newsletter.index', app()->getLocale())->with('succes', trans('alert.edit'));
    }

    public function destroy($lang, $id) {
        $delete = Key::findOrFail($id);

        // if this key is active set first key to active
        if($delete->active==1){
            $update = Key::first();
            if($update == $delete){
                return redirect()->route('newsletter.index', app()->getLocale())->with('danger', trans('alert.error.no'));
            }
            $newkey = new Key();
            $newkey->active = 1;
            $newkey = $newkey->toArray();
            $update->update($newkey);
        }

        $delete->delete();
        return redirect()->route('newsletter.index', app()->getLocale())->with('danger', trans('alert.delete'));
    }
}
