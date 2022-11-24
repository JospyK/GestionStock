<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NumSerie extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'num_series';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'note',
        'is_active',
        'article_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
