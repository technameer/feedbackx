<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comments'; 
    protected $fillable = ['content', 'user_id', 'feedback_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
