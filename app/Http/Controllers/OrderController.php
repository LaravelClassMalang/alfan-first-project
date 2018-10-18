<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // display data record of row amount
        $pagination = 5;

        // filtering
        $order = Order::query();
        // using eager loading 'with'
        $data['orders'] = Order::with(['users:id,name', 'products'])->get();
        // Model::with(['function_name:field_name, field_name', 'function_name'])->get();

        // if parameter product name isset, then do search based on a product name
        if($request->order_id AND $request->order_id != '') {
            $order->where('order_id', 'LIKE', '%'.$request->order_id.'%');
        }

        $data['orders'] = $order->paginate($pagination);

        // numbering
        $number = 1;

        if( request()->has('page') && request()->get('page') > 1) {
            $number += (request()->get('page') - 1) * $pagination;
        }

        return view('orders.index', compact('data', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['orders'] = Order::all();
        $data['products'] = Product::all();
        $data['users'] = User::all();
        return view('orders.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = New Order();
        $order->product_id = $request->product_id;
        $order->user_id = $request->user_id;
        $order->save();

        return redirect()->route('orders.index');
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
    public function edit($id)
    {
        $data['order'] = Order::find($id);
        $data['product'] = Product::all();
        $data['user'] = User::all();

        return view('orders.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $order = Order::find($id);
        $order->product_id = $request->product_id;
        $order->user_id = $request->user_id;
        $order->update();

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('order_id', '=', $id)->delete();

        return redirect()->route('orders.index');
    }
}
