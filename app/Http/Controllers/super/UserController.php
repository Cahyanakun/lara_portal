<?php

namespace App\Http\Controllers\super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Yajra\DataTables\DataTables;  
use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        return view('super.user.view');
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
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users,email',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required',
            'role' => 'required',
            'tanggal_lahir' => 'required',
            'phone' => 'required|string|min:10|max:16',
            'NI' => 'required|string|min:10|max:16',
        ]);

        $input = $request->all();
        $input['image'] = null;
        $input['is_active'] = 1;
        $input['password'] = bcrypt("secret");

        if ($request->hasFile('image')){
            $input['image'] = '/upload/photouser/'.str_random(15, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/upload/photouser/'), $input['image']);
        }

        User::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Profile Created'
        ]);
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
        $users = User::findOrFail($id);
        return $users;
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
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'role' => 'required',
        ]);

        $input = $request->all();
        $users = User::findOrFail($id);
        $input['password'] = bcrypt($request->password);
        $input['image'] = $users->image;

        if ($request->hasFile('image')){
          
            $input['image'] = '/upload/photouser/'.str_random(15, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/upload/photouser'), $input['image']);
        }

        $users->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Profile Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        User::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
    }

    
    public function data(){
        $users = User::all();
        return Datatables::of($users)
        ->addColumn('show_photo', function($users){
            if ($users->image == NULL){
                return 'No Image';
            }
            return '<img class="rounded-square" width="50" height="50" src="'. url($users->image) .'" alt="">';
        })
        ->addColumn('action', function($users){
            return '<a onclick="editForm('. $users->id .')" class="btn btn-primary btn-md"><i class="fa fa-edit"></i> Edit</a> ' .
                   '<a onclick="deleteData('. $users->id .')" class="btn btn-danger btn-md"><i class="fa fa-trash"></i> Delete</a>';
        })
        ->rawColumns(['show_photo', 'action'])->make(true);
    }
}
