<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsList;

class ListaNewsController extends Controller
{
    public function index()
    {
        $listNews = NewsList::OrderBy('created_at', 'DESC')->paginate(15);

        return view('app.list', compact('listNews'));
    }

    public function show($id, $slug)
    {
        $list = NewsList::where('id', $id)->where('slug', $slug)->findOrFail($id);

        // Update Views
        $list->views++;
        $list->timestamps = false;
        $list->save();

        return view('app.view_news', compact('list'));
    }

    public function searchNews(Request $request)
    {
        $title = $request->input('news_search');
        $search = NewsList::where('title', 'LIKE', '%'.$title.'%')->get();

        return view('app.search_news', compact('search'));
    }
}
