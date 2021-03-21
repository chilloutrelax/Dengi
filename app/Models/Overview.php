<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;
    protected $table = "overviews";

    public function user(){
        return $this->belongsTo("User");
    }


    protected $fillable = [
        'date_added',
        'money',
        'comment',
        'type'
    ];
}
