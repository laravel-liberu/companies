<?php

namespace LaravelLiberu\Companies\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\RoutesNotifications;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use LaravelLiberu\Addresses\Traits\Addressable;
use LaravelLiberu\DynamicMethods\Traits\Abilities;
use LaravelLiberu\Helpers\Traits\AvoidsDeletionConflicts;
use LaravelLiberu\Helpers\Traits\CascadesMorphMap;
use LaravelLiberu\People\Models\Person;
use LaravelLiberu\Rememberable\Traits\Rememberable;
use LaravelLiberu\Tables\Traits\TableCache;
use LaravelLiberu\TrackWho\Traits\CreatedBy;
use LaravelLiberu\TrackWho\Traits\UpdatedBy;

class Company extends Model
{
    use Abilities, Addressable, AvoidsDeletionConflicts, CascadesMorphMap, CreatedBy;
    use HasFactory, Rememberable, RoutesNotifications, TableCache, UpdatedBy;

    protected $guarded = ['id'];

    protected $casts = ['pays_vat' => 'boolean', 'is_tenant' => 'boolean'];

    protected $rememberableKeys = ['id', 'name', 'fiscal_code'];

    public function people()
    {
        return $this->belongsToMany(Person::class)
            ->withPivot('position');
    }

    public static function owner()
    {
        return static::cacheGet(Config::get('liberu.config.ownerCompanyId'));
    }

    public function isTenant()
    {
        return $this->is_tenant;
    }

    public function scopeTenant($query)
    {
        $query->whereIsTenant(true);
    }

    public function mandatary()
    {
        return $this->people()
            ->withPivot('position')
            ->wherePivot('is_mandatary', true)
            ->first();
    }

    public function attachPerson(int $personId, ?string $position = null)
    {
        $this->people()->attach($personId, [
            'is_main' => false,
            'is_mandatary' => false,
            'position' => $position,
        ]);
    }

    public function updateMandatary(?int $mandataryId)
    {
        $pivotIds = $this->people->pluck('id')->reduce(
            fn ($pivot, $value) => $pivot
                ->put($value, ['is_mandatary' => $value === $mandataryId]),
            new Collection()
        )->toArray();

        $this->people()->sync($pivotIds);
    }
}
