<?php

namespace App\Models\Cricket;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Cricket\CricketUnitStats.
 *
 * @property int                      $id
 * @property null|int                 $game_schedule_id
 * @property int                      $unit_id
 * @property null|int                 $team_id
 * @property array                    $stats
 * @property null|Carbon              $created_at
 * @property null|Carbon              $updated_at
 * @property null|CricketGameSchedule $gameSchedule
 * @property null|CricketTeam         $team
 * @property CricketUnit              $unit
 *
 * @method static Builder|CricketUnitStats newModelQuery()
 * @method static Builder|CricketUnitStats newQuery()
 * @method static Builder|CricketUnitStats query()
 * @method static Builder|CricketUnitStats whereCreatedAt($value)
 * @method static Builder|CricketUnitStats whereGameScheduleId($value)
 * @method static Builder|CricketUnitStats whereId($value)
 * @method static Builder|CricketUnitStats whereStats($value)
 * @method static Builder|CricketUnitStats whereTeamId($value)
 * @method static Builder|CricketUnitStats whereUnitId($value)
 * @method static Builder|CricketUnitStats whereUpdatedAt($value)
 * @mixin Eloquent
 */
class CricketUnitStats extends Model
{
    protected $table = 'cricket_unit_stats';

    protected $fillable = [
        'game_schedule_id',
        'unit_id',
        'team_id',
        'stats',
    ];

    protected $casts = [
        'stats' => 'array',
    ];

    public function gameSchedule(): BelongsTo
    {
        return $this->belongsTo(CricketGameSchedule::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(CricketUnit::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(CricketTeam::class);
    }
}
