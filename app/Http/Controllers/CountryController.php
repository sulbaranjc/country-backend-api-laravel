<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Muestra el listado de países
     */
    public function index()
    {
        return Country::all();
    }

    /**
     * Almacena un país en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capital' => 'required',
        ]);
        $country = new Country();
        $country->name = $request->name;
        $country->capital = $request->capital;
        $country->save();
        return $country;

    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return $country;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required',
            'capital' => 'required',
        ]);

        $country->name = $request->name;
        $country->capital = $request->capital;
        $country->update();
        return $country;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $country = Country::find($id);

        if(!$country){
            return \response()->json(['message' => 'No se pudo realizar correctaemnete la operación'], 404);
        }

        $country->delete();
        return \response()->noContent();
    }
}
