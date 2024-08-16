<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $fillable =["id","name","start_date","end_date","status","created_at","updated_at"];

    public function positions()
    {
        return $this->hasMany(Position::class,"election_id", "id");
    }
}
