<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Good extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'slug', 'category_id', 'price'
    ];

    public function sluggable(): array{
        return[
            'slug' =>[
                'source' => 'name'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
