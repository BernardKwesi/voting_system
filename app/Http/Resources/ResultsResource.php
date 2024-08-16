<?php

namespace App\Http\Resources;

use App\Models\Nominees;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $position = Position::where("id",$this->position_id)->first();
        $nominee = Nominees::where("id",$this->nominee_id)->first();
        $data = parent::toArray($request);
        $data['position'] = $position->name;
        $data['nominee'] = $nominee->name;

        return $data;
    }
}
