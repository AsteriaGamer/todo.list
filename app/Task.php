<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Task extends Model
{
    protected $fillable = ['title', 'confirmed', 'user_id', 'finish_date', 'finished_at'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
