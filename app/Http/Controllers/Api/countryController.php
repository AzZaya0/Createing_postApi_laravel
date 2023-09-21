<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\country\countryrequest;
use App\Models\countryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class countryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(countryrequest $request)
    {
        $data=[
            'country'=>$request ->country
        ];
        try {
            $country = DB::transaction(function()use($data){
                $country=countryModel::create($data);
            return $country;
        });
        if($country!==null){
            return response()->json([
                'data'=>$country,
                'message'=>'country is saved'
            ]);
        }
        else{
            return response()->json([
                'message'=>'Internal server error ', 500
            ]);
        }
        } catch (\Exception $e) {

            return response()->json(['message'=>$e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
