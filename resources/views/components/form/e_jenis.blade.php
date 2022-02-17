{{Form::model($model, array('route' => array('jenis.update', $jenis)))}}
@method('PUT')

<div class="form-group">
    {!! Form::label('kategori', 'Pilih Jenis', [null]) !!}
    {!! Form::select('kategori', GetJenisForSelect(), $jenis->kategori, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('nama_jenis', 'Nama Jenis', [null]) !!}
    {!! Form::text('nama_jenis', $jenis->nama_jenis, ['class' => 'form-control']) !!}
</div>

<div class="form-group float-right">
    {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}