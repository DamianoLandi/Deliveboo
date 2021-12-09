<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\Type;

use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        $types = Type::all();

        return view('admin.restaurants.index', compact('restaurant', 'types'));
    }

    public function create()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        $types = Type::all();

        return view("admin.restaurants.create", compact('types', 'restaurant'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:100|string|min:3',
            //Modificare quando ci saranno le immagini definitive MEMO
            'logo' => 'string|nullable',
            'address' => 'string|max:255',
            'vat_number' => 'max:11|min:11|string',
            'hours' => 'string|nullable',
            'phone' => 'string|max:30',
        ]);

        $data = $request->all();

        $new_restaurant = new Restaurant();

        $new_restaurant->fill($data);

        $new_restaurant->user_id = Auth::user()->id;

        $new_restaurant->save();

        if (array_key_exists('types', $data)) $new_restaurant->types()->attach($data['types']);

        return redirect()->route('admin.restaurants.index');
    }
}
