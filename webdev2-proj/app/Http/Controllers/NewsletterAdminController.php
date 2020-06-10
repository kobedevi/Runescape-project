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
        // userdata
        $newkey = new Key();
        $newkey->key = $r->key;
        // if user checks "set as active key" change default value from "on/of" to 1 or 0
        $newkey->active = ($r->active=='on' ? '1' : '0');

        // if "set as active key" is checked, set old active key to 0 and update this
        if($newkey->active == 1){
            $oldkey = new Key();
            $oldkey->active = 0;
            $oldkey = $oldkey->toArray();
            $update = Key::where('active', "1")->firstOrFail();
            $update->update($oldkey);
        }

        // if it's an existing key update this key
        if($r->id){
            $newkey = $newkey->toArray();
            $update = Key::where('id', $r->id)->first();
            $update->update($newkey);
        } else{
            // otherwise save it as a new one
            $newkey->save();
        }
        return redirect()->route('newsletter.index',app()->getLocale())->with('succes', trans('alert.add'));
    }

    // when editing existing API key and 
    public function update(Request $r){
        // find old active key and set it to inactive
        $oldkey = new Key();

        $oldkey->active = 0;
        $oldkey = $oldkey->toArray();
        $update = Key::where('active', "1")->firstOrFail();
        $update->update($oldkey);

        // set edited key to active if user 
        $newkey = new Key();
        $newkey->active = 1;
        $newkey = $newkey->toArray();
        $update = Key::where('id', $r->active)->firstOrFail();
        $update->update($newkey);

        return redirect()->route('newsletter.index', app()->getLocale())->with('succes', trans('alert.edit'));
    }

    public function destroy($lang, $id) {
        $delete = Key::findOrFail($id);

        // if this key is active set first found key to active
        if($delete->active==1){
            $update = Key::first();
            // if it's the only key remaining return to the user with error "you can't do that"
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
