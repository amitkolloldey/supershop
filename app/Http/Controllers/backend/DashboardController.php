<?php

namespace App\Http\Controllers\backend;

use App\Models\Pettycash;
use App\Models\Preorder;
use App\Models\Product;
use App\Models\Productcategory;
use App\Models\Sale;
use App\Models\Salescart;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $sales = Sale::all();
        $totalrevenue = 0;
        if ($sales) {
            foreach ($sales as $w) {
                $with = $w->price;
                $totalrevenue += $with;
            }
        }
        $ccategory = Productcategory::all();
        $cproduct = Product::all();
        $totalcategory = count($ccategory);
        $totalproduct = count($cproduct);
        $salescart = Salescart::all();
        $salesToday = Sale::where('created_at',  '>=', Carbon::today())->sum('price');
        return view('backend.dashboard.index', compact('totalrevenue', 'totalcategory', 'totalproduct', 'salescart','salesToday'));
    }

}
