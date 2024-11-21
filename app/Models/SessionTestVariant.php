<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property-read EloquentCollection<int, Session> $session
 * @property-read EloquentCollection<int, Test> $testVariant
 */
class SessionTestVariant extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return BelongsTo<Session, SessionTestVariant>
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    /**
     * @return BelongsTo<TestVariant, SessionTestVariant>

    public function testVariant(): BelongsTo
    {
        return $this->belongsTo(TestVariant::class);
    }
    */
}
