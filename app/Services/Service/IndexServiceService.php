<?php

namespace App\Services\Service;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class IndexServiceService
{
    /**
     * @param  array  $filters
     * @param  array  $relations
     * @param  bool|string $orderBy
     * @param  bool|int  $itemsPerPage
     * @param  bool $authorized
     *
     * @return mixed
     */
    public function run(array $filters = [], array $relations = [], $orderBy = false, $itemsPerPage = false, bool $authorized = true)
    {
        return Service::with($relations)
            ->when($authorized, function (Builder $builder) {
                return $builder->authorizedTenant();
            })
            ->when(Arr::get($filters, 'name'), function (Builder $builder, $name) {
                return $builder->where('name', 'like', "%{$name}%");
            })
            ->when($orderBy, function (Builder $builder, $orderBy) {
                return $builder->orderby($orderBy);
            })
            ->when(
                $itemsPerPage,
                function (Builder $builder, $itemsPerPage) {
                    return $builder->paginate($itemsPerPage);
                },
                function (Builder $builder) {
                    return $builder->get();
                }
            );
    }
}
