<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approvisionnement extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const ETAPE_RADIO = [
        '0' => 'Brouillon',
        '1' => 'Enregistré',
        '2' => 'Validé',
    ];

    public $table = 'approvisionnements';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'article_id',
        'num_serie',
        'description',
        'qte',
        'total_ht',
        'total_tva',
        'total_ttc',
        'user_id',
        'etape',
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
