<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'Tmpemasukan';
    protected $fillable = ['id', 'transaction_id', 'deskripsi_pemasukan'];
    protected $primaryKey = 'id';

    /**
     * Get the Jenis associated with the Pengeluaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Jenis(): BelongsTo
    {
        return $this->belongsTo(Jenis::class);
    }

    /**
     * Get the Transaction associated with the Pengeluaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Transaction(): BelongsTo
    {
        return $this->belongsTo(Trtransactions::class);
    }
}
