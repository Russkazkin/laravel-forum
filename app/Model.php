<?php


namespace LaravelForum;

use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * LaravelForum\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\LaravelForum\Model query()
 * @mixin \Eloquent
 */
class Model extends BaseModel
{
    protected $guarded = [];
}
