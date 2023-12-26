<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\CarModel;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carmodels = CarModel::paginate(5);
        return view('management.carmodel')->with('carmodels', $carmodels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return View('management.createCarModel')->with('brands', $brands);//
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
            'name' => 'required|max:255',
            'startyear' => 'required|numeric',
            'endyear' => 'required|numeric',
            'brandid' => 'required|numeric'
        ]);
        //save information to Menus table
        $carmodel = new CarModel();
        $carmodel->name = $request->name;
        $carmodel->startyear = $request->startyear;
        $carmodel->endyear = $request->endyear;
        $carmodel->revision = $request->revision;
        $carmodel->brandid = $request->brandid;
        $carmodel->save();
        $request->session()->flash('status', $request->name. ' успішно створено');
        return redirect('/management/carmodel');
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
        $carmodel = CarModel::find($id);
        $brands = Brand::all();
        return view('management.editCarModel')->with('carmodel',$carmodel)->with('brands',$brands);
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
            'name' => 'required|max:255',
            'startyear' => 'required|numeric',
            'endyear' => 'required|numeric',
            'brandid' => 'required|numeric'
        ]);
        //save information to Menus table
        $carmodel = CarModel::find($id);
        $carmodel->name = $request->name;
        $carmodel->startyear = $request->startyear;
        $carmodel->endyear = $request->endyear;
        $carmodel->revision = $request->revision;
        $carmodel->brandid = $request->brandid;
        $carmodel->save();
        $request->session()->flash('status', $request->name. ' успішно оновлено');
        return redirect('/management/carmodel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CarModel::destroy($id);
        Session()->flash('status', 'Ця модель успішно видалена');
        return redirect('/management/carmodel');
    }
}
