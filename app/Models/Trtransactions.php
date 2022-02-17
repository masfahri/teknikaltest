<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trtransactions extends Model
{
    use HasFactory;
    protected $tables = 'Trtransactions';
    protected $fillable = ['flag', 'jenis_id', 'amount'];

    /**
     * Get the Jenis that owns the Trtransactions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Jenis(): BelongsTo
    {
        return $this->belongsTo(Jenis::class);
    }

    /**
     * Get the Trpengeluaran associated with the Trtransactions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Pengeluaran(): HasOne
    {
        return $this->hasOne(Pengeluaran::class, 'transaction_id');
    }
    
    /**
     * Get the Trpengeluaran associated with the Trtransactions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Pemasukan(): HasOne
    {
        return $this->hasOne(Pemasukan::class, 'transaction_id');
    }
}
