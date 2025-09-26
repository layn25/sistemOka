<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use Uuid;
    protected $guarded = [];

    public function PenugasanAset()
    {
        return $this->hasMany(PenugasanAset::class, 'aset_id', 'id');
    }
}
