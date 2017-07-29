<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cities = City::paginate(config('pagination.size'));
    return view('cities.listing', compact('cities'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('cities.form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CityRequest $request)
  {
    return $request->saveCity(new City);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\City  $city
   * @return \Illuminate\Http\Response
   */
  public function show(City $city)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\City  $city
   * @return \Illuminate\Http\Response
   */
  public function edit(City $city)
  {
    return view('cities.form', compact('city'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\City  $city
   * @return \Illuminate\Http\Response
   */
  public function update(CityRequest $request, City $city)
  {
    return $request->saveCity($city);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\City  $city
   * @return \Illuminate\Http\Response
   */
  public function destroy(City $city)
  {
    $city->delete();
    return redirect(route('cities.index'));
  }
}
