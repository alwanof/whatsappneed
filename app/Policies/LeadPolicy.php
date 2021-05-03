<?php

namespace App\Policies;

use App\User;
use App\Lead;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class LeadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return Gate::any(['viewLead'], $user);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lead  $lead
     * @return mixed
     */
    public function view(User $user, Lead $lead)
    {
        return Gate::any(['viewLead', 'manageLead'], $user, $lead);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Gate::any(['manageLead'], $user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lead  $lead
     * @return mixed
     */
    public function update(User $user, Lead $lead)
    {
        return Gate::any(['manageLead'], $user, $lead);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lead  $lead
     * @return mixed
     */
    public function delete(User $user, Lead $lead)
    {
        return Gate::any(['manageLead'], $user, $lead);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lead  $lead
     * @return mixed
     */
    public function restore(User $user, Lead $lead)
    {
        return Gate::any(['manageLead'], $user, $lead);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Lead  $lead
     * @return mixed
     */
    public function forceDelete(User $user, Lead $lead)
    {
        return Gate::any(['manageLead'], $user, $lead);
    }
}
