<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Position;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('modules.admin.dashboard');
    }

    public function positions(){
        $elections = Election::where("deleted",0)->get();
        return view('modules.admin.positions.index',compact("elections"));
    }

    public function nominees(){
        $elections = Election::where("deleted",0)->get();
        $positions = Position::where("deleted",0)->get();
        return view('modules.admin.nominees.index',compact('elections','positions'));
    }

    public function elections(){
        return view('modules.admin.elections.index');
    }

    public function users(){
        return view('modules.admin.users.index');
    }

    public function results(){
        $election = Election::where("id",1)->first();

        $positions = $election->positions;
        $positionData = [];

        foreach ($positions as $position) {
            $candidates = $position->nominees;
            $candidateNames = $candidates->pluck('name')->toArray();
            $candidateVotes = $candidates->map(function($candidate) use ($position) {
                return \App\Models\Results::where('nominee_id', $candidate->id)
                                        ->where('position_id', $position->id)
                                        ->count();
            })->toArray();

            $positionData[] = [
                'id' => $position->id,
                'name' => $position->name,
                'labels' => $candidateNames,
                'data' => $candidateVotes
            ];
        }

        return view('modules.admin.results.index', compact("positionData"));
    }


}
