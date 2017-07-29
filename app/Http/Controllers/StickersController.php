<?php

namespace App\Http\Controllers;

use App\Sticker;
use App\Http\Requests\StickerRequest;
use Illuminate\Http\Request;

class StickersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $stickers = Sticker::paginate(config('pagination.size'));
    return view('stickers.listing', compact('stickers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('stickers.form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StickerRequest $request)
  {
    return $request->saveSticker(new Sticker);
   }

  /**
   * Display the specified resource.
   *
   * @param  \App\Sticker  $sticker
   * @return \Illuminate\Http\Response
   */
  public function show(Sticker $sticker)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Sticker  $sticker
   * @return \Illuminate\Http\Response
   */
  public function edit(Sticker $sticker)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Sticker  $sticker
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Sticker $sticker)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Sticker  $sticker
   * @return \Illuminate\Http\Response
   */
  public function destroy(Sticker $sticker)
  {
    //
  }
}
