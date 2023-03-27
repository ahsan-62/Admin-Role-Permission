<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=['id'];

    /*relationships with role */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('role_id');
    }

    /*relationship with module */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

}
