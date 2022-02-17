{!! Form::open(['url' => $url]) !!}

{{ FlagTransactions(App\Enum\GlobalVariable::KATEGORI['PENGELUARAN']) }}

<div class="form-group">
    {!! Form::label('jenis_id', 'Pilih Jenis', [null]) !!}
    {!! Form::select('jenis_id', GetKategoriForSelect(App\Enum\GlobalVariable::KATEGORI['PENGELUARAN']), '', ['class' => 'form-control']) !!}
    <span>Tidak ada Kategori? Klik <a href="{{url('/jenis')}}">Disini</a></span>
</div>

<div class="form-group">
    {!! Form::label('deskripsi_pengeluaran', 'Deskripsi Pengeluaran', [null]) !!}
    {!! Form::textarea('deskripsi_pengeluaran', old('deksripsi'), ['class' => 'form-control', 'cols' => 2, 'rows' => 2]) !!}
</div>

<div class="form-group">
    {!! Form::label('amount', 'Jumlah Pengeluaran', [null]) !!}
    {!! Form::number('amount', old('amount'), ['class' => 'form-control']) !!}
</div>

<div class="form-group float-right">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}