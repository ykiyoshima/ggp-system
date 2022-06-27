<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function getAllOrderBySeasonName()
    {
        return self::orderBy('season_name', 'desc')->get();
    }

    public static function getSeasonBySeasonName(string $season_name)
    {
        return self::where('season_name', $season_name)->first();
    }

    public static function getSeasonBySeasonDate(string $season_date)
    {
        return self::where('season_date', $season_date)->first();
    }
}
