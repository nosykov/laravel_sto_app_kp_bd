<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CarModel;
use App\Client;
use App\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(5);
        return view('management.car')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carmodels = CarModel::all();
        $clients= Client::all();
        return View('management.createCar')->with('clients', $clients)->with('carmodels', $carmodels);//
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
            'clientid' => 'required',
            'modelid' => 'required',
            'regnumber' => 'required'            
        ]);
        //save information to Menus table
        $car = new Car();
        $car->clientid = $request->clientid;
        $car->modelid = $request->modelid;
        $car->color = $request->color;
        $car->mileage = $request->mileage;
        $car->prodyear = $request->prodyear;
        $car->regnumber = $request->regnumber;
        $car->save();
        $request->session()->flash('status', $request->name. ' успішно створено');
        return redirect('/management/car');
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
        $car = Car::find($id);
        $carmodels = CarModel::all();
        $clients= Client::all();
        return view('management.editcar')->with('car', $car)->with('clients', $clients)->with('carmodels', $carmodels);
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
            'clientid' => 'required',
            'modelid' => 'required',
            'regnumber' => 'required'            
        ]);
        //save information to Menus table
        $car = Car::find($id);
        $car->clientid = $request->clientid;
        $car->modelid = $request->modelid;
        $car->color = $request->color;
        $car->mileage = $request->mileage;
        $car->prodyear = $request->prodyear;
        $car->regnumber = $request->regnumber;
        $car->save();
        $request->session()->flash('status', $request->name. ' успішно оновлено');
        return redirect('/management/car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::destroy($id);
        Session()->flash('status', 'Автомобіль успішно видалено');
        return redirect('/management/car');
    }
}
