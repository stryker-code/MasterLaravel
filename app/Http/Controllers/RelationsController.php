<?php

namespace App\Http\Controllers;

use App\Services\Relations\ManyToManyService;
use App\Services\Relations\OneToManyService;
use App\Services\Relations\OneToOneService;

class RelationsController extends Controller
{
    public function oneToOne(OneToOneService $service): string
    {
        return dd($service->getPhoneByUser());
    }

    public function oneToMany(OneToManyService $service): string
    {
        return dd($service->getAllUsersWithTodoLists());
    }

    public function manyToMany(ManyToManyService $service): string
    {
        return dd($service->attachRegionsToStore());
    }
}
