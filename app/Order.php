<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    protected $fillable = ['cart'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
