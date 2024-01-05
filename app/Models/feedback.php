<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks'; 
    protected $fillable = ['title', 'description', 'category', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
