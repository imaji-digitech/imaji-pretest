<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $pretest_question_id
 * @property int $score
 * @property int $answer
 * @property string $created_at
 * @property string $updated_at
 * @property PretestQuestion $pretestQuestion
 * @property User $user
 */
class PretestUserAnswer extends Model
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
    protected $fillable = ['user_id', 'pretest_question_id', 'score', 'answer', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pretestQuestion()
    {
        return $this->belongsTo('App\Models\PretestQuestion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
