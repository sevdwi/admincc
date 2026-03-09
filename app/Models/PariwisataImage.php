<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PariwisataImage extends Model
{
    protected $table = 'pariwisata_images';

    protected $fillable = [
        'pariwisata_id',
        'image'
    ];

    public function pariwisata()
    {
        return $this->belongsTo(Pariwisata::class);
    }
}
