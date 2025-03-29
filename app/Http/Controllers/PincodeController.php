<?php

namespace App\Http\Controllers;

use App\Models\Pincode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PincodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Pincode::get();
        return view("pincode.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("pincode.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate(
            [
                "pincode" => 'required',
                "locality" => "required"
            ]
        );

        $table = new Pincode();
        $table->pincode = $request->pincode;
        $table->locality = $request->locality;
        $table->save();
        return redirect('/pincode');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pincode $pincode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pincode $pincode)
    {
        //
        return view('pincode.edit', compact('pincode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pincode $pincode)
    {
        //
        $table = Pincode::find($pincode->_id);
        $table->pincode = $request->pincode;
        $table->locality = $request->locality;
        $table->save();
        return redirect('pincode')->withSuccess("update success!!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pincode $pincode)
    {
        //
        $pincode->delete();
        return redirect('pincode')->withsuccess("Deleted Successfully!!");
    }


    // public function getPincode(Request $request)
    // {
    //     $locality = $request->input('locality'); // e.g., "Connaught Place, Delhi"
    //     $apiKey = env('GOOGLE_MAPS_API_KEY');

    //     $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
    //         'address' => $locality,
    //         'key' => $apiKey
    //     ]);

    //     $data = $response->json();

    //     if (!empty($data['results'])) {
    //         foreach ($data['results'][0]['address_components'] as $component) {
    //             if (in_array("postal_code", $component['types'])) {
    //                 return response()->json(['pincode' => $component['long_name']]);
    //             }
    //         }
    //     }

    //     return response()->json(['error' => 'Pincode not found'], 404);
    // }
}
