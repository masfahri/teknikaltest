<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenis extends Model
{
    use HasFactory;
    protected $table = 'Tmjenis';
    protected $guarded = [];
    protected $fillable = ['nama_jenis', 'deskripsi_jenis', 'kategori'];

    /**
     * Get all of the Kategoris for the Jenis
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Kategoris(): HasMany
    {
        return $this->hasMany(Kategori::class);
    }

}
