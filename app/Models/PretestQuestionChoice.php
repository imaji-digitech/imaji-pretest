<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $pretest_question_id
 * @property string $answer
 * @property int $score
 * @property string $created_at
 * @property string $updated_at
 * @property PretestQuestion $pretestQuestion
 */
class PretestQuestionChoice extends Model
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
    protected $fillable = ['pretest_question_id', 'answer', 'score', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pretestQuestion()
    {
        return $this->belongsTo('App\Models\PretestQuestion');
    }
}
