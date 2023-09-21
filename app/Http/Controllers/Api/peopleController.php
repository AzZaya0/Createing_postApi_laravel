<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\people\peopleRequest;
use App\Models\people;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class peopleController extends Controller
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
    public function store(peopleRequest $request)
    {
        $data = [
            'people'=>$request->people
        ];
        try {
            $people= DB::transaction(function()use($data){
                $people=people::create($data);
                return $people;

            });
            if($people!==null){
                return response()->json([
                    'data'=>$people,
                    'message'=>'people has been added'

                ]);
            }else{
                return response()->json([
                    'message'=>'internal server error',500
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
