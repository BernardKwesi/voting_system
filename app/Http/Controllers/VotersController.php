<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Voters;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class VotersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $voters = Voters::all();
        return response()->json(
            [
                "data" => $voters
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
                "voter_id" => "required",
                "name" => "required",
                "election" => "required",

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "ok" => false,
                "msg" => "Saving failed: " . join(" ", $validator->errors()->all()),
            ]);
        }




        try {

           Voters::create([

                "name" => ucwords($request->name),
                "election_id"=> $request->election,
                "voter_id" => $request->voter_id

            ]);






            return response()->json([
                "ok" => true,
                "msg" => "Data saved successfully",
            ]);


        } catch (Exception $e) {
            Log::error("Error adding voter". $e->getMessage());

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

    public function vote(Request $request)
    {
        // Get the current active election
        $election = Election::with(['positions.nominees'])->where("status", 1)->first();

        // Check if there is an election
        if (!$election) {
            return redirect()->back()->with(["message" => "No election found"]);
        }



        // Get the current time
        $currentTime = now(); // You can use Carbon::now() if you prefer

        // Check if the current time has passed the end_date of the election
        if ($currentTime->greaterThan($election->end_date) || $election->status == 0) {
            return redirect()->back()->with(["message" => "The election has been closed"]);
        }

        // Check if the voter has already voted
        $voter_id = $request->voter_id;

        //check if the voter id is valid
        $validVoter = Voters::where('voter_id', $voter_id)
                            ->where("election_id", 1)
                            ->exists();

        if (!$validVoter) {
            return redirect()->back()->with(["message" => "Invalid code entered"]);
        }

        $hasVoted = \App\Models\Results::where('voter_id', $voter_id)
                                       ->where("election_id", $election->id)
                                       ->exists();

        if ($hasVoted) {
            return redirect()->back()->with(["message" => "You have already voted"]);
        }

        // Prepare positions for the view
        $positions = [];
        foreach ($election->positions as $position) {
            $positions[$position->name] = $position->nominees;
        }

        return view("vote", compact("election", "positions", "voter_id"));
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
