<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        // restaurant validation
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        $orders =  Plate::where('restaurant_id', $restaurant->id)->with('orders')->get()->pluck('orders')->flatten()->sortDesc();
        $orders = Order::paginate(6);

        return view('admin.orders.index', compact('orders', 'restaurant'));
    }


    public function show($id)
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $order = Order::findOrFail($id);
        $plates = $order->plates;
        // dd($plates);
        foreach ($plates as $plate) {
            $plate->quantity = $plate->pivot->quantity;
            // dd($plate->quantity);
        }

        // dd($plates);



        return view('admin.orders.show', compact('order', 'restaurant', 'plates'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('alert-type', 'success')->with('alert-msg', "Ordine n° $order->id eliminato con successo");
    }


    public function trash()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $orders = Order::onlyTrashed()->get();
        return view('admin.orders.trash', compact('orders', 'restaurant'));
    }

    public function restore($id)
    {
        $order = Order::withTrashed()->find($id);
        $order->restore();
        return redirect()->route('admin.orders.index')->with('alert-type', 'success')->with('alert-msg', "Ordine n° $order->id ripristinato con successo");
    }
}
