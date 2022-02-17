{!! Form::open(['url' => $url]) !!}

<div class="form-group">
    {!! Form::label('kategori', 'Pilih Jenis', [null]) !!}
    {!! Form::select('kategori', GetJenisForSelect(), '', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('nama_jenis', 'Nama Jenis', [null]) !!}
    {!! Form::text('nama_jenis', old('nama_jenis'), ['class' => 'form-control']) !!}
</div>

<div class="form-group float-right">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}