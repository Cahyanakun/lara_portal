<?php

namespace App\Http\Controllers\super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Yajra\DataTables\DataTables;  

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::where('status', 1)->limit(5)->orderBy('created_at','DESC')->get();
        return view('super.banner.view',compact('banner'));
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
            'title' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'body' => 'required|string|max:50',          
        ]);

        $input = $request->all();
        $input['image'] = null;

        if ($request->hasFile('image')){
            $input['image'] = '/upload/photobanner/'.str_random(15, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/upload/photobanner/'), $input['image']);
        }

        Banner::create($input);

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
        $users = Banner::findOrFail($id);
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
            'title' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'body' => 'required|string|max:50', 
        ]);

        $input = $request->all();
        $users = Banner::findOrFail($id);
        $input['image'] = $users->image;

        if ($request->hasFile('image')){
            if (!$users->image == NULL){
                unlink(public_path($users->image));
            }
            $input['image'] = '/upload/photobanner/'.str_random(15, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/upload/photobanner'), $input['image']);
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
        $users = Banner::findOrFail($id);
        Banner::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Contact Deleted'
        ]);
    }

    public function databanner(){
        $users = Banner::all();
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
