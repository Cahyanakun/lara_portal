<?php

namespace App\Http\Controllers\dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Post;
use Yajra\DataTables\DataTables; 

class HomeController extends Controller
{

    public function index()
    {
        $id_users = auth()->user()->id;
        $berita = Post::where('status', 1)->limit(3)->orderBy('created_at','DESC')->get();
        $user = User::where('id', $id_users)->first();
        $dosen = User::where('role', 'dosen')->limit(3)->orderBy('created_at','DESC')->get();
        $mahasiswa = User::where('role', 'mahasiswa')->limit(3)->orderBy('created_at','DESC')->get();
        return view('dosen.home', compact('user','berita','dosen','mahasiswa'));
    }

    public function dosenview()
    {
        return view('dosen.dosen');
    }

    public function mahasiswaview()
    {
        return view('dosen.mahasiswa');
    }

    public function dosenshow($id)
    {
        $dosen = User::findOrFail($id);
        return view('dosen.dosenshow', compact('dosen'));
    }

    public function mahasiswa($id)
    {
        $dosen = User::findOrFail($id);
        return view('dosen.mahasiswashow', compact('dosen'));
    }

    public function datamhs(){
        $users = User::where('role', 'mahasiswa')->orderBy('created_at','DESC')->get();;
        return Datatables::of($users)
        ->addColumn('action', function($users){
            return '<a onclick="showData('. $users->id .')" class="btn btn-primary btn-md"><i class="fa fa-edit"></i> Edit</a> ';
        })
        ->rawColumns(['action'])->make(true);
    }

    public function datadsn(){
        $users = User::where('role', 'dosen')->orderBy('created_at','DESC')->get();;
        return Datatables::of($users)
        ->addColumn('action', function($users){
            return '<a onclick="showData('. $users->id .')" class="btn btn-primary btn-md"><i class="fa fa-edit"></i> Edit</a> ';
        })
        ->rawColumns(['action'])->make(true);
    }

    public function editdsn($id)
    {
        $user = User::findOrFail($id);
        return view('dosen.layouts.editdsn', compact('user'));
    }


    public function updatedsn(Request $request, $id)
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
            return redirect()->route('homedosen')->with('success', 'Profile Edited');
        } 
    }


}
