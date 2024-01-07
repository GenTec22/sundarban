<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;

class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $invoices = Invoice::orderBy('id', 'DESC')->get();
        $sales = sales::all();
        return view('invoice.index', compact('invoices','sales'));
    }


    public function create()
    {

        $invoices = Invoice::latest()->first();
        $sales = sales::all();
        $customers = Customer::all();
        $products = Product::all();

        return view('invoice.create', compact('customers','products','invoices','sales'));
    }


    public function store(Request $request)
    {
        $request->validate([

            'customer_id' => 'required',
            'product_id' => 'required',
            'qty' => 'required',
            'service' => 'required',
            'tax' => 'required',
            'amount' => 'required',


        ]);

        $invoice = new Invoice();
        $invoice->customer_id = $request->customer_id;
        $invoice->inv_number = $request->inv_number;
        $invoice->start_date = $request->start_date;
        $invoice->due_date = $request->due_date;
        $invoice->dis = $request->dis;
        $invoice->save();

        foreach ( $request->product_id as $key => $product_id){
            $sale = new Sales();
            $sale->qty = $request->qty[$key];
            $sale->price = $request->price[$key];
            $sale->service = $request->service[$key];
            $sale->tax = $request->tax[$key];
            $sale->amount = $request->amount[$key];
            $sale->product_id = $request->product_id[$key];
            $sale->invoice_id = $invoice->id;
            $sale->save();


         }

         return redirect('invoice/'.$invoice->id)->with('message','Invoice created Successfully');




    }

    public function findPrice(Request $request){
        $data = DB::table('products')->select('price')->where('id', $request->id)->first();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        $sales = Sales::where('invoice_id', $id)->get();
        return view('invoice.show', compact('invoice','sales'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::all();
        $products = Product::orderBy('id', 'DESC')->get();
        $invoice = Invoice::findOrFail($id);
        $sales = Sales::where('invoice_id', $id)->get();

        // dd($invoice);
        return view('invoice.edit', compact('customers','products','invoice','sales'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',

        ]);



        $invoice = Invoice::findOrFail($id);
        $invoice->customer_id = $request->customer_id;
        $invoice->inv_number = $request->inv_number;
        $invoice->start_date = $request->start_date;
        $invoice->due_date = $request->due_date;
        $invoice->dis = $request->dis;
        $invoice->save();

        Sales::where('invoice_id', $id)->delete();

        foreach ( $request->product_id as $key => $product_id){
            $sale = new Sales();
            $sale->qty = $request->qty[$key];
            $sale->price = $request->price[$key];
            $sale->service = $request->service[$key];
            $sale->tax = $request->tax[$key];
            $sale->amount = $request->amount[$key];
            $sale->product_id = $request->product_id[$key] ;
            $sale->invoice_id = $invoice->id;
            $sale->save();


        }

         return redirect('invoice/'.$invoice->id)->with('message','invoice created Successfully');


    }



    public function destroy($id)
    {
        Sales::where('invoice_id', $id)->delete();
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->back();

    }
}
