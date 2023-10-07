<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashTypeModel extends Model
{
    use HasFactory;

    protected $table = 'trash_types';
    protected $fillable = [
        'id',
        'name',
        'description',
        'photo_url',
        'price_per_kg',
    ];

    // Anda dapat menambahkan atribut-atribut lain yang sesuai dengan kebutuhan Anda

    // Relasi ke transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
