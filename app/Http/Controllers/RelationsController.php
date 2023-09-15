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

        if (!$user->phone) {
            return $user->phone()->create([
                'phone' => fake()->phoneNumber(),
                'operator' => 'kstar',
                'expire_date' => Carbon::now()
            ]);
        } else {
            $phone = Phone::find($user->phone->id);
            logs()->critical($phone->user->name);
        }

        return $phone->user->phone->user->phone;
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
