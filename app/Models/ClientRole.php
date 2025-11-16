<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ClientRole extends Model
{
    protected $fillable = ['user_id', 'client_id', 'role_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function client()
    {
        return $this->belongsTo(\Laravel\Passport\Client::class, 'client_id');
    }
}
