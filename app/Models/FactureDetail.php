<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FactureDetail extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'facture_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'article_id',
        'description',
        'num_serie',
        'tva',
        'qte',
        'total_ht',
        'total_tva',
        'total_ttc',
        'user_id',
        'facture_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function facture()
    {
        return $this->belongsTo(Facture::class, 'facture_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
