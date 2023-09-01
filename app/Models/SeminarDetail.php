<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seminar;
use App\Models\Entry;
use App\Models\Record;
use App\Models\Owner;
use App\Models\Survey;
use App\Models\Answer;

class SeminarDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminar_id',
        'speaker_id',
        'speaker_name',
        'seminar_name',
        'target',
        'title',
        'descriptions',
        'filename',
        'date',
    ];

    public function seminar() {
        return $this->belongsTo(Seminar::class);
    }

    public function entry() {
        return $this->hasOne(Entry::class, 'detail_id', 'id');
    }

    public function record() {
        return $this->hasOne(Record::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function survey()
    {
        return $this->hasOne(Survey::class);
    }

    public function answer() {
        return $this->hasMany(Answer::class);
    }
}
