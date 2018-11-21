<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\NewsList;
use App\User;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = NewsList::OrderBy('created_at', 'DESC')->simplePaginate(10);
        $user = User::get();

        return view('auth.admin.news.list_news', compact('news', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.news.add_noticia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $data = $request->all();

        $data['id_user'] = \Auth::user()->id;
        $data['slug'] = str_slug($request->input('title'));
        
        if (NewsList::create($data)) {
            $request->session()->flash('success', 'Notícia adicionada com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao cadastrar notícia');
        }

        return redirect()->route('admin.news.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = NewsList::findOrFail($id);

        if ($news->id_user == \Auth::id() OR \Auth::user()->admin == 0) {
            return view('auth.admin.news.edit_news', compact('news'));
        }
        
        return redirect()->route('admin.news.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        $news = NewsList::find($id);

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->updated_at = date('Y-m-d H:i:s');

        if ($news->id_user == \Auth::id() OR \Auth::user()->admin == 0) {
            if ($news->save()) {
                $request->session()->flash('success', 'Notícia atualizada com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro ao atualizar notícia');
            }
        }

        return redirect()->route('admin.news.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if (\Auth::user()->admin == 0) {
            $news = NewsList::findOrFail($id);

            if ($news->delete()) {
                $request->session()->flash('success', 'Notícia deletada com sucesso!');
            } else {
                $request->session()->flash('error', 'Erro ao deletar notícia');
            }

            return redirect()->route('admin.news.list');
        } else {
            $request->session()->flash('error', 'Erro ao deletar notícia');
            return redirect()->route('admin.news.list');
        }
    }
}
