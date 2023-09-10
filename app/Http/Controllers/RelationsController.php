<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Carbon\Carbon;

class RelationsController extends Controller
{
    public function oneToOne(): string
    {
        $user = User::query()->first();

        $phone = 432432434222;

        if (!$user->phone) {
            return $user->phone()->create([
                'phone' => $phone,
                'operator' => 'kstar',
                'expire_date' => Carbon::now()
            ]);
        } else {
            $phone = Phone::find($user->phone->id);
            logs()->critical($phone->user->name);
        }

        return User::query()->whereHas('phone', function ($query) use ($phone) {
            $query->where('phone', '=', $phone);
        })->get();
    }

    public function oneToMany(): string
    {
        return __METHOD__;
    }

    public function manyToMany(): string
    {
        return __METHOD__;
    }
}
