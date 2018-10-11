<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // display data record of row amount
        $pagination = 2;

        // filtering
        $products = Product::query();

        // if parameter product name isset, then do search based on a product name
        if($request->product_name AND $request->product_name != '') {
            $products->where('product_name', 'LIKE', '%'.$request->product_name.'%');
        }elseif($request->stock AND $request->stock != '') {
            $products->where('stock', 'LIKE', '%'.$request->stock.'%');
        }elseif($request->price AND $request->price != '') {
            $products->where('price', 'LIKE', '%'.$request->price.'%');
        }

        $data['products'] = $products->paginate($pagination);

        // numbering
        $number = 1;

        if( request()->has('page') && request()->get('page') > 1) {
            $number += (request()->get('page') - 1) * $pagination;
        }

        return view('products.index', compact('data', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('products.create', compact('data'));
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
            'product_name' => 'required|unique:products,product_name',
            'category_id' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ]);

        // dd($request->all());
        Product::create($request->only('product_name', 'category_id', 'stock', 'price'));
        return redirect()->route('products.index');
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
    public function edit($product_id)
    {
        $data['product'] = Product::find($product_id);
        $data['categories'] = Category::all();
        return view('products.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        // dd($request->all());
        Product::where('product_id', '=', $product_id)->update($request->only('product_name', 'category_id', 'stock', 'price'));
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        Product::where('product_id', '=', $product_id)->delete();
        
        return redirect()->route('products.index');
    }
}
