<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $pretest_aspect_id
 * @property string $title
 * @property int $question_type
 * @property int $answer
 * @property string $created_at
 * @property string $updated_at
 * @property PretestAspect $pretestAspect
 * @property PretestQuestionChoice[] $pretestQuestionChoices
 * @property PretestUserAnswer[] $pretestUserAnswers
 */
class PretestQuestion extends Model
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
    protected $fillable = ['pretest_aspect_id', 'title', 'question_type', 'answer', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pretestAspect()
    {
        return $this->belongsTo('App\Models\PretestAspect');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pretestQuestionChoices()
    {
        return $this->hasMany('App\Models\PretestQuestionChoice');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pretestUserAnswers()
    {
        return $this->hasMany('App\Models\PretestUserAnswer');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('title', 'like', '%' . $query . '%');
    }
}
