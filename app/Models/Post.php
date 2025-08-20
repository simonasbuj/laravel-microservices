<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'image',
        'likes',
        'title',
        'user_id'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
