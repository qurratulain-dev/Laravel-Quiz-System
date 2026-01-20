<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Quiz extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'user_id',
        'is_completed',
    ];
     public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
