<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
             'name' => $this->name,
             'email' => $this->email,
             'password' =>  $this->password,
             'date_of_birth' => Carbon::make($this->date_of_birth)
                 ?->format('d-m-y'),
             'updated_at' => $this->updated_at,
             'todo' => $this->tasks->map(function ($task) {
                 return $task->name;
             })
         ];
    }
}
