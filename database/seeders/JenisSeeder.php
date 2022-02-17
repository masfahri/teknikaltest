<?php

namespace Database\Seeders;

use App\Models\Jenis;
use App\Enum\GlobalVariable;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenis::create([
            'nama_jenis' => 'GAJI',
            'deskripsi_jenis' => 'GAJI BULANAN',
            'kategori' => GlobalVariable::KATEGORI['PEMASUKAN']
        ]);
        
        Jenis::create([
            'nama_jenis' => 'TUNJANGAN',
            'deskripsi_jenis' => 'TUNJANGAN HARI RAYA',
            'kategori' => GlobalVariable::KATEGORI['PEMASUKAN']
        ]);

        Jenis::create([
            'nama_jenis' => 'Bonus',
            'deskripsi_jenis' => 'Bonus BULANAN',
            'kategori' => GlobalVariable::KATEGORI['PEMASUKAN']
        ]);

        Jenis::create([
            'nama_jenis' => 'SEWA KOS',
            'deskripsi_jenis' => 'TEMPAT TINGGAL',
            'kategori' => GlobalVariable::KATEGORI['PENGELUARAN']
        ]);
        
        Jenis::create([
            'nama_jenis' => 'MAKAN',
            'deskripsi_jenis' => 'BERTAHAN HIDUP',
            'kategori' => GlobalVariable::KATEGORI['PENGELUARAN']
        ]);

        Jenis::create([
            'nama_jenis' => 'PAKAIAN',
            'deskripsi_jenis' => 'ACCESORIS',
            'kategori' => GlobalVariable::KATEGORI['PENGELUARAN']
        ]);
        
        Jenis::create([
            'nama_jenis' => 'NONTON BIOSKOP',
            'deskripsi_jenis' => 'HIBURAN',
            'kategori' => GlobalVariable::KATEGORI['PENGELUARAN']
        ]);
    }
}
