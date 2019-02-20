<?php

namespace App\Http\Controllers\mahasiswa;

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
        return view('mahasiswa.home', compact('user','berita','dosen','mahasiswa'));
    }

    public function dsnv()
    {
        return view('mahasiswa.dosen');
    }

    public function mhsv()
    {
        return view('mahasiswa.mahasiswa');
    }

    public function dsns($id)
    {
        $dosen = User::findOrFail($id);
        return view('mahasiswa.dosenshow', compact('dosen'));
    }

    public function mhss($id)
    {
        $dosen = User::findOrFail($id);
        return view('mahasiswa.mahasiswashow', compact('dosen'));
    }

    public function tabledsn(){
        $users = User::where('role', 'dosen')->orderBy('created_at','DESC')->get();;
        return Datatables::of($users)
        ->addColumn('action', function($users){
            return '<a onclick="showData('. $users->id .')" class="btn btn-primary btn-md"><i class="fa fa-edit"></i> Edit</a> ';
        })
        ->rawColumns(['action'])->make(true);
    }

    
    public function tablemhs(){
        $users = User::where('role', 'mahasiswa')->orderBy('created_at','DESC')->get();;
        return Datatables::of($users)
        ->addColumn('action', function($users){
            return '<a onclick="showData('. $users->id .')" class="btn btn-primary btn-md"><i class="fa fa-edit"></i> Edit</a> ';
        })
        ->rawColumns(['action'])->make(true);
    }

    public function editmhs($id)
    {
        $user = User::findOrFail($id);
        return view('mahasiswa.layouts.editmhs', compact('user'));
    }

    public function updatemhs(Request $request, $id)
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
            return redirect()->route('homemahasiswa')->with('success', 'Profile Edited');
        } 
    }
}
