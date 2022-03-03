<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use Carbon\Carbon;

class DashboardAgroindustriController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function daily()
  {
    $datastocks = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Agroindustri')->get();
    $highestAmount = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Agroindustri')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Agroindustri')
      ->count();
    $yesterday = Carbon::today()->toDateString();
    return view('dashboard.agroindustri.agroindustri', compact('datastocks', 'highestAmount', 'dataStockLength', 'yesterday'));
  }

  public function search(Request $request)
  {
    $date = $request->input('date');
    $stockbydates = Stock::where('date', '=', $date)
      ->where('class', 'Agroindustri')
      ->get();
    $datastocks = Stock::all();
    $yesterday = Carbon::today()->toDateString();
    $highestAmount = Stock::where('date', '=', $date)
      ->where('class', 'Agroindustri')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', $date)
      ->where('class', 'Agroindustri')
      ->count();

    // dd($stockbydate);

    return view('dashboard.agroindustri.agroindustribydate', compact('datastocks', 'stockbydates', 'highestAmount', 'dataStockLength', 'date'));
  }

  public function product()
  {
    $PTPGRajawaliI = 3;
    $dataproduct = Product::where('class', 'Agroindustri')->get();
    $dataproductPTPGRajawaliI = Product::where('user_id', $PTPGRajawaliI)->get();
    $dataproductPTPGCandiBaru = Product::where('class', 'PT PG Candi Baru')->get();
    $dataProductLength = Product::where('class', 'Agroindustri')->count();
    $dataCategoryLength = Category::where('group_id', 2)->count();
    $dataCategory = Category::where('group_id', 2)->get();
    return view(
      'dashboard.agroindustri.agroindustriproduct',
      compact(
        'dataproduct',
        'dataProductLength',
        'dataCategory',
        'dataCategoryLength',
        'dataproductPTPGRajawaliI',
        'dataproductPTPGCandiBaru'
      )
    );
  }
}