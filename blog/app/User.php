<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function hasRole($role) { return $this->hasRoles([$role]); }
    public function hasRoles(Array $roles) {
        foreach ($roles as $role) {
            if ( ! in_array($role, $this->roles())){
                return false;
            }
        }
        return true;
    }
    private function roles() {
        $roles = $this->hasManyThrough('App\Role', 'App\UserRole');
        dd($roles->get());
        return $roles;
    }

    public function hasTask($task) { return $this->hasTasks([$task]); }
    public function hasTasks(Array $tasks) {
        foreach ($tasks as $task) {
            if ( ! in_array($task, $this->tasks())){
                return false;
            }
        }
        return true;
    }
    private function tasks() {
        $tasks = $this->hasManyThrough('App\Task', 'App\UserTask');
        dd($tasks->get());
        return $tasks;
    }
}
