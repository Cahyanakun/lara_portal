<?php

namespace App\Http\Controllers\mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use App\Category;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_users = auth()->user()->id;
        $post = Post::where('user_id', $id_users)->get();
        return view('mahasiswa.berita.view',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('mahasiswa.berita.form', compact('category'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'image' => 'required',
            'status' => 'required',
            'subtitle' => 'required',
        ]);

        if ($request->hasFile('image')){
            $imagename = '/upload/post/'.str_random(15, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/upload/post/'), $imagename);
        }
        
        $input = new Post;
        $input->title = $request->title;
        $input->status = $request->status;
        $input->subtitle = $request->subtitle;
        $input->image = $imagename;
        $input->body = $request->body;
        
        auth()->user()->post()->save($input);
        $input->categories()->sync($request->categories);

        return redirect()->route('postmhs.index')->with('success', 'Created');
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
        $berita = Post::with('categories')->where('id', $id)->first();
        $category = Category::all();
        return view('mahasiswa.berita.edit', compact('berita', 'category'));
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
        $input = $request->all();
        $berita = Post::findOrFail($id);
        $input['image'] = $berita->image;
        $input['categories'] = $berita->categories()->sync($request->categories);

        if ($request->hasFile('image')){
            if (!$berita->image == NULL){
                unlink(public_path($berita->image));
            }
            $input['image'] = '/upload/post/'.str_random(15, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/upload/post'), $input['image']);
        }

        if ($berita->update($input)) {
            return redirect()->route('postmhs.index')->with('success', 'Edited');
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
        if(Post::destroy($id)){
            return redirect()->route('postmhs.index')->with('success', 'Deleted');
        }   
    }
}
