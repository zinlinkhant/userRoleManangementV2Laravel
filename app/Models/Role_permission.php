<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_permission extends Model
{
    /** @use HasFactory<\Database\Factories\RolePermissionFactory> */
    use HasFactory;
    protected $table = 'role_permissions'; // Ensure it matches the pivot table name
    protected $fillable = ['role_id', 'permission_id'];

    /**
     * Get the role associated with this role-permission entry.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the permission associated with this role-permission entry.
     */
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    /**
     * Assign a permission to a role.
     */
    public static function assignPermission($roleId, $permissionId)
    {
        return self::firstOrCreate([
            'role_id' => $roleId,
            'permission_id' => $permissionId
        ]);
    }

    // /**

}