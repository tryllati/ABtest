<?php

namespace App\Models;

use App\Enums\ABTestDivisionTypeEnum;
use App\Models\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

/**
 * @property int $id
 * @property string $name
 * @property ABTestDivisionTypeEnum $type
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read EloquentCollection<int, TestVariant> $variants
 */
#[ScopedBy([StatusScope::class])]
class Test extends Model
{
    protected $table = 'tests';

    /**
     * @var array<string, mixed>
     */
    protected $casts = [
        'id'     => 'integer',
        'name'   => 'string',
        'type'   => ABTestDivisionTypeEnum::class,
        'status' => 'int',
    ];

    /**
     * @return HasMany<TestVariant>
     */
    public function variants(): HasMany
    {
        return $this->hasMany(TestVariant::class)->where('status', 1);
    }
}
