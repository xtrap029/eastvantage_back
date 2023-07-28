<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int>
     */
    protected $fillable = [
        'user_id',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for simplicity.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'user_id',
        'role_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Include role relationship
     */
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
