<?php

namespace App\Models;

use App\Enums\TaskCacheEnum;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name','is_completed'];

    public static function getTasks(): Collection
    {
        $key = TaskCacheEnum::TASKS_KEY->value;

        if (Cache::has($key)) {
            $tasks = Cache::get($key);
        } else {
            $tasks = Task::all();
            Cache::put($key, $tasks);
        }

        return $tasks;
    }
}
