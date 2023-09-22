<?php

namespace App\Services\Relations;

use App\Models\Region;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;

class ManyToManyService
{
    protected Model $store;

    public function __construct()
    {
        $this->store = Store::firstOrFail();
        $this->region = Region::firstOrFail();
    }

    public function attachRegionsToStore()
    {
        $regions = [1, 2, 3];

        return $this->store->regions()->attach($regions);
    }

    public function getRegions()
    {
        return $this->store->regions()->get();
    }

    public function getStores()
    {
        return $this->region->stores()->get();
    }

    public function getIntermediateTableColumn()
    {
        return $this->store->regions()->first()->pivot;
    }

    public function updateStoreRegions(): array
    {
        $regions = [2, 3];

        return $this->store->regions()->sync($regions);
    }

    public function deleteStoreRegions(): int
    {
        $regions = [2];

        return $this->store->regions()->detach($regions);
    }
}
