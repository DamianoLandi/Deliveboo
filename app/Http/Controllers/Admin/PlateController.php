<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::where('restaurant_id', Auth::user()->id)->paginate(6);
        $categories = Category::all();


        // take the restaurant id associated at the current user
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        return view('admin.plates.index', compact('categories', 'plates', 'restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plate = new Plate();
        $categories = Category::all();

        // take the restaurant id associated at the current user
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        return view('admin.plates.create', compact('plate', 'categories', 'restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // data validation
        $request->validate([
            'name' => 'required|unique:plates|max:255',
            'image' => 'nullable',
            'price' => 'min:1|max:6',
            'is_available' => 'nullable'
        ]);

        // catch the request value
        $data = $request->all();

        // transform is_available in a boolean value
        $boolean = filter_var($data['is_available'], FILTER_VALIDATE_BOOLEAN);
        // reinsert in the request
        $data['is_available'] = $boolean;

        // creation of a new plate instance
        $new_plate = new Plate();

        // added restaurant_id 
        $restaurantId = Restaurant::where('user_id', Auth::user()->id)->pluck('id')->toArray();
        $new_plate->restaurant_id = $restaurantId[0];

        if (array_key_exists('image', $data)) {
            // fill the image with the uploaded file
            $img_path = Storage::put('public', $data['image']);
            $data['image'] = $img_path;
        }

        // fill the new instance with the request data
        $new_plate->fill($data);

        // saving the new instance
        $new_plate->save();

        // attach categories to plate
        if (array_key_exists('categories', $data)) $new_plate->categories()->attach($data['categories']);

        // showing the result
        return redirect()->route('admin.plates.show', $new_plate->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plate = Plate::find($id);

        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        return view('admin.plates.show', compact('plate', 'restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        // taking categories
        $categories = Category::all();
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        // taking plate category Ids to verify who is checked
        $categoriesIds = $plate->categories->pluck('id')->toArray();

        return view('admin.plates.edit', compact('plate', 'categories', 'categoriesIds', 'restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {


        // data validation
        $request->validate([
            'name' => ['required', 'string', Rule::unique('plates')->ignore($plate->id)],
            'image' => 'nullable',
            'price' => 'min:1|max:6'
        ]);

        // catch all the data from the request
        $data = $request->all();

        $boolean = filter_var($data['is_available'], FILTER_VALIDATE_BOOLEAN);
        // reinsert in the request
        $data['is_available'] = $boolean;

        // verifyng the checked categories
        if (!array_key_exists('categories', $data)) $plate->categories()->detach();
        else $plate->categories()->sync($data['categories']);

        // fill the image with the uploaded file
        if (array_key_exists('image', $data)) {
            // fill the image with the uploaded file
            if ($plate->image) Storage::delete($plate->image);
            $img_path = Storage::put('public', $data['image']);
            $data['image'] = $img_path;
        }

        // update 
        $plate->update($data);


        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        // result
        return view('admin.plates.show', compact('plate', 'restaurant'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        // detaching the child first
        $plate->categories()->detach();

        // deleting plate 
        $plate->delete();

        // result
        return redirect()->route('admin.plates.index')->with('type', 'success')->with('msg', "$plate->title eliminato con successo");
    }
}
