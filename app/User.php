<?php

namespace LaravelForum;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use LaravelForum\Notifications\VerifyEmail;

/**
 * LaravelForum\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\LaravelForum\Discussion[] $discussions
 * @property-read int|null $discussions_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\LaravelForum\Reply[] $replies
 * @property-read int|null $replies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }
}
