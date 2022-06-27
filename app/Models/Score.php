<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function getPartsOrderByTotalScore()
    {
        return self::selectRaw('season_name, speaker_name, speaker_class, avg(voice_score + appearance_score + passion_score + design_score + behavior_score) as total_score')->groupBy('season_name', 'speaker_name', 'speaker_class')->orderBy('total_score', 'asc')->get();
    }
    public static function getEachScore()
    {
        return self::selectRaw('season_name, speaker_name, speaker_class, reviewer_name, voice_score, appearance_score, passion_score, design_score, behavior_score, comment')->orderBy('season_name', 'asc')->get();
    }
}
