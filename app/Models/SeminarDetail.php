<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seminar;
use App\Models\Entry;
use App\Models\Record;
use App\Models\Owner;

class SeminarDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminar_id',
        'speaker_id',
        'title',
        'descriptions',
        'filename',
        'is_opening',
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
}
