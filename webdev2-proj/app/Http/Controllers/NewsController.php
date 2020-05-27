<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
class NewsController extends Controller
{
    public function getIndex() {
        $blogs = News::paginate(10);

        $enmonths = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'); 
        $nlmonths = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');

        return view('news', compact('blogs', 'enmonths', 'nlmonths'));
    }

    public function getDetail($lang, $news) {
        $post = News::where('id', $news)
        ->firstOrFail();

        return view('newsDetail', compact('post'));
    }
}
