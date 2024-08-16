<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResultsResource;
use App\Models\Election;
use App\Models\Results;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultsController extends Controller
{
    public function index(){
        //get the current active election id
        $election = Election::where("status",1)->first();
        if(empty($election)){
            return response()->json([
                "ok"=> true,
                "data" => []
            ]);

        }

        $results = Results::select(DB::raw('position_id,nominee_id,count(*) as votes'))
        ->groupBy('position_id', 'nominee_id')
        ->where('election_id', $election->id)
        ->orderBy('votes', 'DESC')
        ->get();


        return response()->json([
            "ok"=> true,
            "data" => ResultsResource::collection($results)
        ]);
    }
}
