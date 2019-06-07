<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Services\SearchingScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SearchingScope, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category',
        'title',
        'comments',
        'content',
        'tag_category_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'question_id');
    }

    public function tagcategory()
    {
        return $this->belongsTo(TagCategory::class, 'tag_category_id');
    }

    public function SearchingWord($inputs)
    {
        return $this->filterEqual('tag_category_id', $inputs['tag_category_id'])
                    ->filterLike('title', $inputs['searchword'])
                    ->orderby('created_at', 'desc')
                    ->get();
    }

}

