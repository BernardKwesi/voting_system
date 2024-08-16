<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominees extends Model
{
    use HasFactory;

    protected $fillable =["id","name","img_url","motto","description","position_id","created_at","updated_at"];

    public function position(){
        return $this->belongsTo(Position::class,'position_id','id');
    }

}
