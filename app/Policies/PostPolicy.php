<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\RolePermissions;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        $permission = "Index";

        $getPermissions = RolePermissions::where('permissions', $permission)
                                ->where('role_id', $user->role_id)->count();

        return $getPermissions == 1
                ? Response::allow()
                : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        $permission = "View";

        $getPermissions = RolePermissions::where('permissions', $permission)
                                ->where('role_id', $user->role_id)->firstOrFail();;

        return $getPermissions
                ? Response::allow()
                : "ini di block";
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $permission = "Create";

        $getPermissions = RolePermissions::where('permissions', $permission)
                                ->where('role_id', $user->role_id)->firstOrFail();;

        return $getPermissions
                ? Response::allow()
                : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        $permission = "Update";

        $getPermissions = RolePermissions::where('permissions', $permission)
                                ->where('role_id', $user->role_id)->firstOrFail();;

        return $getPermissions
                ? Response::allow()
                : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        $permission = "Delete";

        $getPermissions = RolePermissions::where('permissions', $permission)
                                ->where('role_id', $user->role_id)->firstOrFail();;

        return $getPermissions
                ? Response::allow()
                : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
