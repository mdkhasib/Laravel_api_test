<?php

namespace App\Http\Controllers;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Data::all();
        return response($data,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        dd("create_form_view");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            "title" => "required"
        ]);

        $RequestData = $request->all();

        $insert= Data::create($RequestData);

        return response($insert,200);

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
        $targetData= Data::where('id',$id)->first();
        return response($targetData,200);
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
        $targetData= Data::where('id',$id)->first();
        return response($targetData,200);
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
        //
        $validatedData = $request->validate([
            "title" => "required"
        ]);

        $RequestData = $request->all();

        $targetData= Data::where('id',$id)->first();
        $update = $targetData->update($RequestData);

        return response($update,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $targetData= Data::where('id',$id)->delete();
        return response('data deleted successfully',200);
    }

    public function search_by_title($like_search)
    {
        //
        $targetData= Data::where('title', 'LIKE', "%{$like_search}%")->get();
        // dd($targetData);

        return response($targetData,200);
    }
}
