<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Part;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::paginate(20);
        return view('management.part')->with('parts', $parts); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('management.createPart');
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
            'name' => 'required|max:100',
            'rest' => 'required|numeric',
            'price' => 'required|numeric'
        ]);
        $part = new Part;
        $part->name = $request->name;
        $part->category = $request->category;
        $part->rest = $request->rest;
        $part->price = $request->price;
        $part->save();
        $request->session()->flash('status', $request->name. " успішно збережено");
        return(redirect('/management/part'));
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
        $part = Part::find($id);
        return view('management.editPart')->with('part',$part);
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
            'name' => 'required|max:100',
            'rest' => 'required|numeric',
            'price' => 'required|numeric'
        ]);
        $part = Part::find($id);
        $part->name = $request->name;
        $part->category = $request->category;
        $part->rest = $request->rest;
        $part->price = $request->price;
        $part->save();
        $request->session()->flash('status', $request->name. " успішно оновлено");
        return(redirect('/management/part'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Part::destroy($id);
        Session()->flash('status', 'Запчастину успішно видалено');
        return redirect('/management/part');
    }
}
