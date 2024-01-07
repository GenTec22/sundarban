<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::with('product')->orderBy('id', 'DESC')->paginate(15); // Include products related to sales

      return view('sales.index', compact('sales'));

//    /     $encodedSku = json_encode($sales);


// print_r($encodedSku);

    }
}
