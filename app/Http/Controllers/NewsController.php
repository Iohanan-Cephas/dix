<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show(int $id){
        $news = News::where('user_id',Auth::id())->where('id',$id)->firstOrFail();
    
        return view('pages.news.show', ['news'=>$news]);
    }

    public function edit(int $id){
        $news = News::where('user_id',Auth::id())->where('id',$id)->firstOrFail();
    
        return view('pages.news.edit', ['news'=>$news]);
    }

    public function render(){
        $news = News::where('user_id',Auth::id())->get();

        return view('pages.news.index', ['news'=>$news]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string'
        ]);

        $news = News::create([
            'title'=>$validated['title'],
            'content'=>$validated['content'],
            'user_id'=>Auth::id()
        ]);

        return redirect('/news');
    }

    public function getAll(){
        $news = News::where('user_id',Auth::id())->get();

        return response()->json($news);
    }

    public function update(int $id, Request $request){
        $validated = $request->validate([
            'title'=>'string|max:255',
            'content'=>'string'
        ]);

        $news = News::where('user_id',Auth::id())->where('id',$id)->firstOrFail();

        $news->update($validated);

        return redirect('/news')->with('sucess', 'noticia atualizada');
    }

    public function delete(int $id){
        $news = News::where('user_id',Auth::id())->where('id',$id)->firstOrFail();

        $news->delete();

        return redirect('/news');
    }
}
