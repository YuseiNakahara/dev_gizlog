<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'comment',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}