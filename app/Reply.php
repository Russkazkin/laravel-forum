<?php

namespace LaravelForum;

/**
 * LaravelForum\Reply
 *
 * @property int $id
 * @property int $user_id
 * @property int $discussion_id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \LaravelForum\Discussion $discussion
 * @property-read \LaravelForum\User $owner
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Reply whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Reply whereDiscussionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Reply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Reply whereUserId($value)
 * @mixin \Eloquent
 */
class Reply extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}
