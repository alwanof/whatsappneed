<?php

namespace App\Policies;

use App\User;
use App\Plan;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class PlanPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return Gate::any(['managePlan'], $user);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Plan  $plan
     * @return mixed
     */
    public function view(User $user, Plan $plan)
    {
        return Gate::any(['managePlan'], $user, $plan);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Gate::any(['managePlan'], $user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Plan  $plan
     * @return mixed
     */
    public function update(User $user, Plan $plan)
    {
        return Gate::any(['managePlan'], $user, $plan);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Plan  $plan
     * @return mixed
     */
    public function delete(User $user, Plan $plan)
    {
        return Gate::any(['managePlan'], $user, $plan);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Plan  $plan
     * @return mixed
     */
    public function restore(User $user, Plan $plan)
    {
        return Gate::any(['managePlan'], $user, $plan);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Plan  $plan
     * @return mixed
     */
    public function forceDelete(User $user, Plan $plan)
    {
        return Gate::any(['managePlan'], $user, $plan);
    }
}
