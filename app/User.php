<?php

namespace Pibbble;

use Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, AuthorizableContract
{
    use Authenticatable, CanResetPassword, Authorizable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'password', 'name', 'email', 'bio', 'location', 'avatar', 'provider', 'uid'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'token'];

    /**
     * Finds by username.
     *
     * @var array
     */
    public static function findByUsernameOrFail($username, $columns = ['*'])
    {
        if (! is_null($user = static::where('username', 'ILIKE', '%'.$username.'%')->first($columns))) {
            return $user;
        }

        throw new ModelNotFoundException;
    }

    public function projects()
    {
        return $this->hasMany('Pibbble\Project');
    }

    /**
     * Get the avatar from gravatar.
     * @return string
     */
    private function getAvatarFromGravatar()
    {
        return 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?d=mm&s=500';
    }

    /**
     * Get avatar from the model.
     * @return string
     */
    public function getAvatar()
    {
        return (! is_null($this->avatar)) ? $this->avatar : $this->getAvatarFromGravatar();
    }

    public function updateProfile($formData)
    {
        foreach ($formData as $key => $value) {
            $this->$key = $value;
        }

        $this->save();
    }

    public function updateAvatar($img)
    {
        $this->avatar = $img;

        $this->save();
    }

    /**
     * Defines follow relationship.
     * @return follow relationship
     */
    public function follows()
    {
        return $this->belongsToMany('Pibbble\User', 'user_follows', 'user_id', 'follow_id')->withTimestamps();
    }

    /**
     * Define followers relationship.
     * @return followers relationship
     */
    public function followers()
    {
        return $this->belongsToMany('Pibbble\User', 'user_follows', 'follow_id', 'user_id');
    }

    /**
     * Check if User follows a user.
     */
    public function checkFollow()
    {
        $follow = $this->followers()->find(Auth::user()->id);
        if ($follow) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * many to one relationship
     * many teams to one user.
     * @return string
     */
    public function teams()
    {
        return $this->belongsToMany('Pibbble\Team', 'team_members', 'user_id', 'team_id')->withTimestamps();
    }

    public function teamFollows()
    {
        return $this->belongsToMany('Pibbble\Team', 'team_follows', 'user_id', 'team_id')->withTimestamps();
    }
}
