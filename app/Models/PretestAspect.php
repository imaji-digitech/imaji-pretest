<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property int $time
 * @property string $created_at
 * @property string $updated_at
 * @property PretestQuestion[] $pretestQuestions
 */
class PretestAspect extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title', 'time','description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pretestQuestions()
    {
        return $this->hasMany('App\Models\PretestQuestion');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%');
    }

}
