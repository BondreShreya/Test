<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = "posts";

    protected $fillable = [
        'userId', 'title', 'body', // Use 'userId' instead of 'userID'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id'); // Define a belongsTo relationship to the User model
    }
}

