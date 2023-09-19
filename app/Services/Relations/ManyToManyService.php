<?php

namespace App\Services\Relations;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;

class ManyToManyService
{
    protected Model $store;

    public function __construct()
    {
        $this->store = Store::firstOrFail();
    }

    public function attachRegionsToStore()
    {
        $regions = [1, 2, 3];

        return $this->store->regions()->attach($regions);
    }
}
