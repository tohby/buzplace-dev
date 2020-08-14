<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    
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

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function products(){
        return $this->hasMany('App\Products');
    }

    public function getGravatarAttribute() {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash";
    }

    public function posts() {
        return $this->hasMany('App\Posts');
    }

    public function consultations() {
        return $this->hasMany('App\Consultation');
    }

    public function getAvatar( $size = 64 ) {
        return $this->getGravatar( $this->email, $size );
    }

    public function getFirstNameAttribute()
    {
        return ucfirst(strtok($this->attributes['name'], " "));
    }

    public function getAvatarAttribute(){
        if ($this->attributes['avatar'] != null){
            return $this->attributes['avatar'];
        }
    }

    public function getDisplayNameAttribut(){
        return '<svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-patch-check-fll text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984a.5.5 0 0 0-.708-.708L7 8.793 5.854 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
        </svg>';
    }
}
