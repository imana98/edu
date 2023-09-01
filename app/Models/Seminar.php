<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SeminarDetail;

class Seminar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'target',
        'explain',
        'date',
    ];

    public function seminarDetail() {
        return $this->belongsTo(SeminarDetail::class);
    }

    public function survey() {
        return $this->hasMany(Survey::class);
    }
}
