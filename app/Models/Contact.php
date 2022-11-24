<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'contacts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'reference',
        'raison_sociale',
        'name',
        'telephone_1',
        'telephone_2',
        'email',
        'adresse',
        'client',
        'fournisseur',
        'created_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function contactFactures()
    {
        return $this->hasMany(Facture::class, 'contact_id', 'id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
