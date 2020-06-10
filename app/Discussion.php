<?php

namespace LaravelForum;

use LaravelForum\Notifications\ReplyMarkedAsBestReply;

/**
 * LaravelForum\Discussion
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property int|null $reply_id
 * @property string $slug
 * @property int $channel_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \LaravelForum\User $author
 * @property-read \LaravelForum\Reply|null $bestReply
 * @property-read \Illuminate\Database\Eloquent\Collection|\LaravelForum\Reply[] $replies
 * @property-read int|null $replies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion whereReplyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Discussion whereUserId($value)
 * @mixin \Eloquent
 */
class Discussion extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id,
        ]);

        $reply->owner->notify(new ReplyMarkedAsBestReply());
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }
}
