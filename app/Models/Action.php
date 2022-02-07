<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function contexts()
    {
        return $this->belongsToMany(Context::class, "action_context", "action_id", "action_id");
    }
    
    public function users(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
