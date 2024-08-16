<?php

namespace App\Http\Controllers;

use App\Http\Resources\NomineeResource;
use App\Models\Nominees;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class NomineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $nominees = Nominees::all();
        return response()->json(
            [
                "data" =>NomineeResource::collection($nominees)
            ]
            );
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                "name" => "required",
                "image" => "required",
                "position" => "required"

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Saving election failed: " . join(" ", $validator->errors()->all()),
            ]);
        }




        try {

            if ($request->hasFile('image') != null) {
                $filePath = $request->file("image")->store("public/images/nominees");
                $img_url = '/' . str_replace("public", "storage", $filePath);
            }

           Nominees::create([

                "name" => ucwords($request->name),
                "description" => $request->description,
                "motto" => $request->motto,
                "position_id"=> $request->position,
                "img_url" => $img_url,

            ]);






            return response()->json([
                "ok" => true,
                "msg" => "Data saved successfully",
            ]);


        } catch (Exception $e) {
            Log::error("Error adding nominee". $e->getMessage());
            return response()->json([
                "ok" => false,
                "msg"=> "Oops! An error occured while adding record, please contact admin ):",
                "error" => [
                    "msg" => $e->__toString(),
                    "fix" => "Please complete all required fields",
                ]
            ]);
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
