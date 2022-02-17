<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Saldo Saat Ini</h5>
                <p class="card-text">Rp. {{(empty($pemasukan) || empty($pengeluaran)) ? number_format(CountPemasukan() - CountPengeluaran()) : '-'}}</p>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pemasukan</h5>
                <p class="card-text">Rp. {{empty($pemasukan) ? number_format(CountPemasukan()) : '-'}}</p>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pengeluaran</h5>
                <p class="card-text">Rp. {{empty($pengeluaran) ? number_format(CountPengeluaran()) : '-'}}</p>
            </div>
        </div>
    </div>
</div>