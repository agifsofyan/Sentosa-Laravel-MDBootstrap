<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesStoreRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::latest()->get();
        return view('admins.categories.index', compact('categories'));
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

            $categories = new Categories;
            $categories->category_name   = $request->category_name;
            $categories->category_slug   = str_slug($request->category_name);
            $categories->keterangan      = $request->keterangan;
            
            $categories->save();

            if ($categories->save()) {
                toastr()->success('!! Data '.$categories->category_name.' berhasil dibuat !!');
                return redirect()->route('categories.index', $categories->id);
            }else {
                toastr()->error('Gagal membuat data, coba sekali lagi.');
                return back();
            }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Categories::findOrFail($id);
        $categories->category_name   = $request->category_name;
        $categories->category_slug   = str_slug($request->category_name);
        $categories->keterangan      = $request->keterangan;
            
        $categories->save();

        if ($categories->save()) {
            toastr()->success('!! Data berhasil diedit !!');
            return redirect()->route('categories.index', $categories->id);
        }else {
            toastr()->error('Gagal membuat data, coba sekali lagi.');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categories::findOrFail( $id );
        // $post->delete();
        // Session::flash('warning', 'Post deleted');
        // return redirect()->route('posts.index');
        if ($data->delete()) {
            toastr()->info('!! Data '.$data->category_name.'  berhasil dihapus !!');
            return redirect()->route('categories.index', $data->id);
        }else{
            toastr()->error('Terjadi kesalahan pada internet, coba sekali lagi.');
            return back();
        }
    }
}
