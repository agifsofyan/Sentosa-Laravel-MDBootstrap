<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Articles;
// use Image;
// use Session;
use File;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Articles::latest()->get();
        $check = Articles::all();
        return view('admins.articles.index', compact('data', 'check'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Articles;
        $data->author_ID    = $request->author_ID;
        $data->category_ID  = $request->category_ID;
        $data->post_title   = $request->post_title;
        $data->post_slug    = str_slug($request->post_title);
        $data->post_content = $request->post_content;
        $data->statuses     = $request->statuses;

        $data->save();

        if ($data->save()) {
            toastr()->success('!! Data '.$data->post_title.' berhasil dibuat !!');
            return redirect()->route('articles.index', $data->id);
        }else {
            toastr()->error('Gagal membuat data, coba sekali lagi.');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Articles::findOrFail($id);

        $data->author_ID    = $request->input('author_ID');
        $data->category_ID  = $request->input('category_ID');
        $data->post_title   = $request->input('post_title');
        $data->post_slug    = str_slug($request->input('post_title'));
        $data->post_content = $request->input('post_content');
        $data->statuses     = $request->input('statuses');

        $data->save();

        if ($data->save()) {
            toastr()->success('!! Data '.$data->post_title.' berhasil dibuat !!');
            return redirect()->route('articles.index', $data->id);
        }else {
            toastr()->error('Gagal membuat data, coba sekali lagi.');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Articles::findOrFail( $id );
        // $post->delete();
        // Session::flash('warning', 'Post deleted');
        // return redirect()->route('posts.index');
        if ($data->delete()) {
            toastr()->info('!! Data '.$data->post_title.'  berhasil dihapus !!');
            return redirect()->route('articles.index', $data->id);
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }
    }
}
