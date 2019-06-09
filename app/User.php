<?php

namespace App;

use Rackbeat\UIAvatars\HasAvatar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasAvatar;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug', 'email', 'password', 'description', 'location', 'businessName', 'avatar', 'phone', 'website',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName()
{
    return 'slug';
}

    public function products(){
        return $this->hasMany('App\Products');
    }

    public function getGravatarAttribute() {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function consultations() {
        return $this->hasMany('App\Consultation');
    }

    public function getAvatar( $size = 64 ) {
        return $this->getGravatar( $this->email, $size );
    }

    public function consultations() {
        return $this->hasMany('App\Consultation');
    }
}
