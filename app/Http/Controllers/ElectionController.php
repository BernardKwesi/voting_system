<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Results;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $elections = Election::all();
        return response()->json(
            [
                "data" => $elections
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
                "start" => "required",
                "end" => "required",
                "status" => "required"

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Saving election failed: " . join(" ", $validator->errors()->all()),
            ]);
        }




        try {


            if($request->status == 1){
                Election::where("status",1)->update([
                    'status' => 0
                ]);
            }

           Election::create([
                "name" => ucwords($request->name),
                "start_date" => $request->start,
                "end_date" => $request->end,
                "status"=> $request->status,
                "deleted" => 0
            ]);








            return response()->json([
                "ok" => true,
                "msg" => "Data saved successfully",
            ]);
        } catch (Exception $e) {
            Log::error("Error adding election ". $e->getMessage());
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

    public function vote(Request $request){

        try{
            DB::beginTransaction();

            foreach ($request->votes as $key => $value) {

                Results::create([
                    "voter_id"=>$request->voter_id,
                    "election_id" => $request->election_id,
                    "position_id" => $value['position_id'],
                    "nominee_id" => $value['candidate_id'],
                    "created_at" => now()

                ]);

            }

            DB::commit();

            return response()->json([
                "ok" => true,
                "msg"=> "Thank You for your Vote !"
            ]);

        }catch(Exception $e){
            DB::rollBack();
            Log::info($e->getMessage());
            return response()->json([
                "ok" => false,
                "msg" => "An error occurred . Please try again later"
            ]);
        }




    }



    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "id" => "required",
                "name" => "required",
                "start" => "required",
                "end" => "required",
                "status" => "required"

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Updating election failed: " . join(" ", $validator->errors()->all()),
            ]);
        }




        try {


           $election = Election::where("id",$request->id)->first();
           if(empty($election)){
            return response()->json([
                "ok" => false,
                "msg" => "Election not found ",
            ]);
           }

           $election->update([
                "name" => ucwords($request->name),
                "start_date" => $request->start,
                "end_date" => $request->end,
                "status"=> $request->status,

            ]);








            return response()->json([
                "ok" => true,
                "msg" => "Data updated successfully",
            ]);
        } catch (Exception $e) {
            Log::error("Error updating election ". $e->getMessage());
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
}
