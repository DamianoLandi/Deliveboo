<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Plate;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::with('types', 'plates')->get();
        return response()->json($restaurants);
    }


    // with(['types', 'plates'])->

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant_plates = Plate::where('restaurant_id', $id)->with('restaurant')->get();
        $filtered_plate = [];
        foreach ($restaurant_plates as $plate) {
            $filtered_plate[] = [
                'id' => $plate->id,
                'name' => $plate->name,
                'image' => $plate->image,
                'description' => $plate->description,
                'quantity' => 0,
                'price' => $plate->price,
                'serving' => $plate->serving,
                'is_available' => $plate->is_available,
            ];
        }

        $result = [
            'restaurant' => $restaurant,
            'plates' => $filtered_plate,
        ];

        return response()->json($result);
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
