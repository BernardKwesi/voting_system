<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;


    protected $fillable =["id","name","election_id","created_at","updated_at"];

    public function election(){
        return $this->belongsTo(Election::class,'election_id','id');
    }

    public function nominees()
    {
        return $this->hasMany(Nominees::class,"position_id","id");
    }
}
