<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class SubTask extends Model
{
    protected $fillable = ['title', 'confirmed', 'task_id', 'start_time', 'end_time'];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i');
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
