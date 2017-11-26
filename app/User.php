<?php

namespace App;

use DB;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    /**
     * Check if user has a role
     *
     * @param  string|array $role       The role name
     * @return boolean
     */
    public static function hasRole($roleName)
    {
            
        if ($user = self::getAuthenicatedUserFromAdminGuard()) {

            return self::getRoles($user, $roleName);

        }
        return false;
    }

    /**
     * Get user from auth guard "admin"
     * 
     * @return mixed
     */
    private static function getAuthenicatedUserFromAdminGuard()
    {
        if (count($authGuard = Auth::guard('admin')->user()) > 0) {
            return $authGuard;
        }
        return false;
    }

    /**
     * Check user permissions.
     *
     * If user has the permission/s(can create post).
     * 
     * @param  string|array $permissions
     * 
     * @return bool
     */
    public static function canDo($permissions)
    {
        $hit = 0;
        $user = self::getAuthenicatedUserFromAdminGuard();
        
        $perms = ! is_array($permissions) ? (array) $permissions : $permissions; 

        $permissions =  Permission::whereIn('name', $perms)->with('roles')->get();
        
        
        /**
         * Count of $perms and $permissions must always be equal,
         * otherwise return false
         */
        // if (count($perms) != count($permissions)) {
        //     return false;
        // }

        // very slow code
        // refactor this
        foreach($permissions as $roles){

            foreach($roles->roles as $role){

                foreach (self::getRoles($user) as $userrole) {
                    
                    if ($userrole->pivot->role_id === $role->pivot->role_id) {
                        $hit++;
                    }

                    $userrole = null;
                }
                $role = null;
            }

            $roles = null;
        }


        return $hit > 0 ? true : false;
        
    }

    /**
     * Get the roles of the user
     *
     * @param  mixed $user
     * @param  string $roleName
     * 
     * @return bool
     */
    public static function getRoles($user, $roleName = null)
    {
        if (is_null($roleName)) {
            return $user->roles;
        }

        foreach ($user->roles as $role) {
            if (is_array($roleName)) {
                if (in_array($role->name, $roleName)) {
                    return true;
                }
            }elseif ($role->name === $roleName) {
                return true;
            }
            $role = null;
        }

        return false;
    }

}
