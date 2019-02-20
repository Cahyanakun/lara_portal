<?php

namespace App\Http\Controllers\super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Post;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $dosen = User::where('role','dosen')->count();
        $mahasiswa = User::where('role','mahasiswa')->count();
        $category = Category::all()->count();
        $post = Post::all()->count();
        return view('super.home', compact('dosen','mahasiswa','category','post'));
    }

    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return view('super.layouts.edituser', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'bio' => 'required',
            'quotes' => 'required', 
        ]);

        $input = $request->all();
        $users = User::findOrFail($id);
        $input['image'] = $users->image;

        if ($request->hasFile('image')){
            $input['image'] = '/upload/photouser/'.str_random(15, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/upload/photouser'), $input['image']);
        }

        if ($users->update($input)) {
            return redirect()->route('homesuper')->with('success', 'Profile Edited');
        } 
    }
}
