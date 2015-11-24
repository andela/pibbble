<?php

namespace Pibbble;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

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
            if (! empty($value)) {
                $this->$key = $value;
            }
        }

        $this->save();
    }

    public function updateAvatar($img)
    {
        $this->avatar = $img;

        $this->save();
    }
}
