<?php

namespace App\Services\Relations;

use App\Models\Phone;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OneToOneService
{
    protected Model $user;
    public function __construct()
    {
        $this->user = User::firstOrFail();
    }

    public function createPhone(Model $user): Model
    {
        return $user->phone()->create([
            'phone' => fake()->phoneNumber(),
            'operator' => 'kstar',
            'expire_date' => Carbon::now()
        ]);
    }

    public function getUserByPhone(Phone $phone)
    {
        return $phone->user;
    }

    public function getPhoneByUser()
    {
        if (!$this->user->phone) {
            $phone = $this->createPhone($this->user);
        } else {
            $phone = $this->user->phone;
        }

        return $phone;
    }

    public function deleteUserPhone(): bool
    {
        return (bool)$this->user->phone()->delete();
    }
}
