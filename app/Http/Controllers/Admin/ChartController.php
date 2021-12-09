<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Redirect, Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $TotOrders = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
            ->where('created_at', '<', Carbon::today())
            ->groupBy('month_name', 'month')
            ->orderBy('month')
            ->get();
            

        $amounts = Order::select(DB::raw("SUM(amount) as amount"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
            ->where('created_at', '<', Carbon::today())
            ->groupBy('month_name', 'month')
            ->orderBy('month')
            ->get();



        // Array per grafico di ordini totali su base mensile
        $data = [];

        // Array per ammontare delle vendite su base mensile
        $dataAmount = [];

        foreach ($TotOrders as $row) {
            $data['label'][] = $row->month_name;
            $data['data'][] = (int)$row->count;
        };

        foreach ($amounts as $row) {
            $dataAmount['label'][] = $row->month_name;
            $dataAmount['data'][] = (int)$row->amount;
        };


        /*    $data = [

            [
                'label' => ['Prova1', 'prova2', 'prova3', 'prova4'],
                'data' => [10, 20, 30, 40],
            ],
        ]; */

        $data['chart_data'] = json_encode($data);
        $dataAmount['chart_data_amount'] = json_encode($dataAmount);
        return view('admin.orders.statistics.index', $data, $dataAmount)->with('restaurant',$restaurant);
    }
}
