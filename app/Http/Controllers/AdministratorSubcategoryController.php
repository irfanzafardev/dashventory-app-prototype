<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class AdministratorSubcategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('administrator.subcategories.subcategory', [
      'subcategories' => Subcategory::all()
    ]);
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
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Subcategory  $subcategory
   * @return \Illuminate\Http\Response
   */
  public function show(Subcategory $subcategory)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Subcategory  $subcategory
   * @return \Illuminate\Http\Response
   */
  public function edit(Subcategory $subcategory)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Subcategory  $subcategory
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Subcategory $subcategory)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Subcategory  $subcategory
   * @return \Illuminate\Http\Response
   */
  public function destroy(Subcategory $subcategory)
  {
    //
  }
}