<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSupplier;
use App\Models\Supplier;
use App\Models\Tax;
use App\Models\Unit;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $product = Product::all();

        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('product.create');
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
            'name' => 'required|unique:products|regex:/^[a-zA-Z ]+$/',
            'code' => 'required',
            'price' => 'required',

        ]);


        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->save();


        return redirect()->back()->with('message', 'New product has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productsshow =Product::findOrFail($id);
        return view('product.show', compact('productsshow'));
    }


    public function edit($id)
    {


        $products =Product::findOrFail($id);
        return view('product.edit', compact('products'));
    }



    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|unique:products,name,' . $id . '|regex:/^[a-zA-Z ]+$/',
        'code' => 'required',
        'price' => 'required',

    ]);

    $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found');
    }

    $product->name = $request->name;
    $product->code = $request->code;
    $product->price = $request->price;
    $product->save();


    // if ($request->hasFile('image')) {
    //     $existingImagePath = public_path("images/product/{$product->image}");
    //     if (file_exists($existingImagePath) && is_file($existingImagePath)) {
    //         unlink($existingImagePath); // Delete the existing image file
    //     }

    //     $imageName = $request->image->getClientOriginalName();
    //     $request->image->move(public_path('images/product/'), $imageName);
    //     $product->image = $imageName;
    // }

    // if ($request->hasFile('image')) {
    //     // Delete the existing image file if it exists
    //     $existingImagePath = public_path("images/product/{$product->image}");
    //     if (file_exists($existingImagePath) && is_file($existingImagePath)) {
    //         unlink($existingImagePath);
    //     }

    //     $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
    //     $request->image->move(public_path('images/product/'), $imageName);

    //     $product->image = $imageName;
    // }




            // Update or create product suppliers



    return redirect()->back()->with('message', 'Product has been updated successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();

    }
}
