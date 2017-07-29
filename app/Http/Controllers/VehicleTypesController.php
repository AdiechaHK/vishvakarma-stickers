<?php

namespace App\Http\Controllers;

use App\VehicleType;
use App\Http\Requests\VehicleTypeRequest;
use Illuminate\Http\Request;

class VehicleTypesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $vehicleTypes = VehicleType::paginate(config('pagination.size'));
    return view('vehicle_type.listing', compact('vehicleTypes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('vehicle_type.form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(VehicleTypeRequest $request)
  {
    return $request->saveVehicleType(new VehicleType);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\VehicleType  $vehicleType
   * @return \Illuminate\Http\Response
   */
  public function show(VehicleType $vehicleType)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\VehicleType  $vehicleType
   * @return \Illuminate\Http\Response
   */
  public function edit(VehicleType $vehicleType)
  {
    return view('vehicle_type.form', compact('vehicleType'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\VehicleType  $vehicleType
   * @return \Illuminate\Http\Response
   */
  public function update(VehicleTypeRequest $request, VehicleType $vehicleType)
  {
    return $request->saveVehicleType($vehicleType);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\VehicleType  $vehicleType
   * @return \Illuminate\Http\Response
   */
  public function destroy(VehicleType $vehicleType)
  {
    $vehicleType->delete();
    return redirect(route('vehicle-types.index'));
  }
}
