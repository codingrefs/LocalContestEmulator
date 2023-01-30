<?php

namespace App\Models\Cricket;

use App\Models\ActionPoint;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Cricket\CricketGameLog.
 *
 * @property int                 $id
 * @property int                 $game_schedule_id
 * @property int                 $unit_id
 * @property int                 $action_point_id
 * @property string              $value
 * @property null|Carbon         $created_at
 * @property null|Carbon         $updated_at
 * @property ActionPoint         $actionPoint
 * @property CricketGameSchedule $gameSchedule
 * @property CricketUnit         $unit
 *
 * @method static Builder|CricketGameLog newModelQuery()
 * @method static Builder|CricketGameLog newQuery()
 * @method static Builder|CricketGameLog query()
 * @method static Builder|CricketGameLog whereActionPointId($value)
 * @method static Builder|CricketGameLog whereCreatedAt($value)
 * @method static Builder|CricketGameLog whereGameScheduleId($value)
 * @method static Builder|CricketGameLog whereId($value)
 * @method static Builder|CricketGameLog whereUnitId($value)
 * @method static Builder|CricketGameLog whereUpdatedAt($value)
 * @method static Builder|CricketGameLog whereValue($value)
 * @mixin Eloquent
 */
class CricketGameLog extends Model
{
    protected $table = 'cricket_game_log';

    protected $fillable = [
        'game_schedule_id',
        'unit_id',
        'action_point_id',
        'value',
    ];

    public function gameSchedule(): BelongsTo
    {
        return $this->belongsTo(CricketGameSchedule::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(CricketUnit::class);
    }

    public function actionPoint(): BelongsTo
    {
        return $this->belongsTo(ActionPoint::class);
    }
}
