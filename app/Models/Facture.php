<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facture extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const ETAPE_RADIO = [
        '0' => 'Brouillon',
        '1' => 'Enregistrer',
    ];

    public $table = 'factures';

    protected $dates = [
        'date_facture',
        'date_reglement',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reference',
        'date_facture',
        'date_reglement',
        'total_ht',
        'total_ttc',
        'note',
        'contact_id',
        'user_id',
        'is_locked',
        'etape',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Facture::observe(new \App\Observers\FactureActionObserver());
    }

    public function getDateFactureAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateFactureAttribute($value)
    {
        $this->attributes['date_facture'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDateReglementAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateReglementAttribute($value)
    {
        $this->attributes['date_reglement'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
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
