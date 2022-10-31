<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Good;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'contact_email', 'contact_phone'];

    public function user(){
        return $this->belongsTo('User');
    }

    public function goods(){
        return $this->belongsToMany(Good::class)->withPivot('quantity');
    }
}
