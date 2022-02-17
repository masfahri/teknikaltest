<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'Tmpengeluarans';
    protected $fillable = ['id', 'transaction_id', 'deskripsi_pengeluaran'];
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
