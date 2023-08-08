<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SeminarDetail;
use App\Models\User;


class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'detail_id',
        'seminar_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seminarDetail()
    {
        return $this->belongsTo(SeminarDetail::class, 'detail_id', 'id');
    }
}
