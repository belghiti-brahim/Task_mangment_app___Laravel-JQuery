<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Context extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function actions()
    {
        return $this->belongsToMany(Action::class, "action_context", "action_id", "action_id");
    }
}
