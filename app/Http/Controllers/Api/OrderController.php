<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // dd($request->all());
        $data = $request->all();
        $order = new Order();
        $order->customer_name = $data['customer_name'];
        $order->customer_lastname = $data['customer_lastname'];
        $order->customer_address = $data['customer_address'];
        $order->customer_email = $data['customer_email'];
        $order->amount = $data['amount'];
        $order->is_payed = 0;
        $order->save();

        foreach ($data['order_details'] as $key => $detail) {
            $order->plates()->attach($key, ['quantity' => $detail]);
        }

        return response()->json([
            'Message' => 'Order was successfully created',
            'Order_number' => $order->id
        ], 200);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
