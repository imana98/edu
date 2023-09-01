<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
use App\Models\SeminarDetail;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail_id',
        'title',
        'question01',
        'question02',
        'question03',
        'question04',
    ];

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function seminar_detail()
    {
        return $this->belongsTo(SeminarDetail::class);
    }

    public function seminar() {
        return $this->belongsToMany(Seminar::class);
    }
}
