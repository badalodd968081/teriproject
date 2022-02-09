<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Midea;

class Mideacontroller extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=Midea::all();
        return view('backend.midea.index',[
            'data'=>$data,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illumnate\Http\Response
     */
    public function create()
    {
        return view('backend.midea.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        if($request->hasFile('midea_image')){
            $image=$request->file('midea_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);
        }else{
            $reImage='na';
        }

        $midea=new Midea;
        $midea->title=$request->title;
        $midea->detail=$request->detail;
        $midea->image=$reImage;
        $midea->save();

        return redirect('admin/midea/create')->with('success','Data has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Category::find($id);
        return view('backend.midea.update',['data'=>$data]);
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
        $request->validate([
            'title'=>'required'
        ]);

        if($request->hasFile('midea_image')){
            $image1=$request->file('midea_image');
            $reImage=time().'.'.$image1->getClientOriginalExtension();
            $dest=public_path('/imgs/midea');
            $image->move($dest,$reImage);
        }else{
            $reImage=$request->midea_image;
        }

        $midea=Midea::find($id);
        $midea->title=$request->title;
        $midea->detail=$request->detail;
        $midea->image=$reImage;
        $midea->save();

        return redirect('admin/midea/'.$id.'/edit')->with('success','Data has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Midea::where('id',$id)->delete();
        return redirect('admin/midea');
    }
}
