<?php

namespace App\Traits;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        if (!app()->runningInConsole() && auth()->check()) {

            static::creating(function (Model $model) {
                $model->team_id = auth()->user()->current_team_id;
            });

            static::addGlobalScope('team_id', function (Builder $builder) {
                $field = sprintf('%s.%s', $builder->getQuery()->from, 'team_id');

                $builder->where($field, auth()->user()->current_team_id);
            });
        }
    }

    /**
     * Get the team that owns the Model
     *
     * @return BelongsTo
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
