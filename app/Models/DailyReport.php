<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Services\SearchingScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{

    use SoftDeletes, SearchingScope;

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'contents',
        'reporting_time',
    ];

    protected $dates = [
        'reporting_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fetchAllPersonalReports($userId)
    {
        return $this->filterEqual('user_id', $userId)
                    ->orderby('created_at', 'desc')
                    ->get();
    }

    public function fetchSearchingReports($userId, $conditions)
    {
        return $this->filterEqual('user_id', $userId)
                    ->filterLike('reporting_time', $conditions['search-month'])
                    ->orderby('created_at', 'desc')
                    ->get();
    }
}
