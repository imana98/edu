<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Survey;
use App\Models\SeminarDetail;

class Answer extends Model
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

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function detail()
    {
        return $this->belongsTo(SeminarDetail::class);
    }
}
