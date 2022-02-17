{{Form::model($model, array('route' => array('pemasukan.update', $transaction)))}}
@csrf
@method('PUT')
<div class="form-group">
    {!! Form::label('jenis_id', 'Pilih Jenis', [null]) !!}
    {!! Form::select('jenis_id', GetJenisForSelect(), $transaction->Transaction->jenis_id, ['class' => 'form-control']) !!}
    <span>Tidak ada Kategori? Klik <a href="{{url('/jenis')}}">Disini</a></span>
</div>
<div class="form-group">
    {!! Form::label('deskripsi_pemasukan', 'Deskripsi Pemasukan', [null]) !!}
    {!! Form::textarea('deskripsi_pemasukan', $transaction->deskripsi_pemasukan, ['class' => 'form-control', 'cols' => 2, 'rows' => 2]) !!}
</div>

<div class="form-group">
    {!! Form::label('amount', 'Jumlah Pemasukan', [null]) !!}
    {!! Form::number('amount', $transaction->Transaction->amount, ['class' => 'form-control']) !!}
</div>

<div class="form-group float-right">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}