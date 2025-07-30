<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPaper extends Model
{
    protected $fillable = [
        'exam_id',
        'user_id',
        'question_count',
        'questions_order',
        'current_position',
        'status',
        'last_seen_at',
        'submitted_at',
        'expired_at'
    ];
    protected $casts = [
        'submitted_at' => 'datetime',
        'created_at' => 'datetime',
        'last_seen_at' => 'datetime',
        'expired_at' => 'datetime',
    ];


    public function exam(){
        return $this->belongsTo(Exam::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function examRecord(){
        return $this->hasOne(ExamRecord::class);
    }

    public function studentAnswers() {
        return $this->hasMany(StudentAnswer::class);
    }
}
