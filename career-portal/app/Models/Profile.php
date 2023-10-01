<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=[
        'address',
        'phone',
        'city',
        'country',
        'postal_code',
        'resume',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

}
