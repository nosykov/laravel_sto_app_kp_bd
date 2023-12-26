<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Master;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masters = Master::paginate(5);
        return view('management.master')->with('masters', $masters); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('management.createMaster');
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
            'fullname' => 'required|max:100'
        ]);
        $master = new Master;
        $master->fullname = $request->fullname;
        $master->email = $request->email;
        $master->phone = $request->phone;        
        $master->save();
        $request->session()->flash('status', $request->name. " успішно збережено");
        return(redirect('/management/master'));
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
        $master = Master::find($id);
        return view('management.editMaster')->with('master',$master);
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
            'fullname' => 'required|max:100'
        ]);
        $master = Master::find($id);
        $master->fullname = $request->fullname;
        $master->email = $request->email;
        $master->phone = $request->phone;        
        $master->save();
        $request->session()->flash('status', $request->name. " успішно збережено");
        return(redirect('/management/master'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Master::destroy($id);
        Session()->flash('status', 'Працівника успішно видалено');
        return redirect('/management/master');
    }
}
