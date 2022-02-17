{!! Form::open(['id' => 'form-handphone']) !!}
{!! Form::hidden('user_id', \Auth::user()->id, [null]) !!}
<div class="form-group">
    {!! Form::label('phone_no', 'Nomor Telf', [null]) !!}
    {!! Form::number('phone_no', old('phone_no'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('provider', 'Provider', [null]) !!}
    {!! Form::select('provider', array('' => 'pilih provider', 'xl' => 'xl', 'simpati' => 'simpati'), '', ['class' =>
    'form-control']) !!}
</div>
<div class="float-right">
    <button type="button" id="btnSave" class="btn btn-success">Save</button>

    <button class="btn btn-danger" id="btnAuto">Auto</button>
</div>
{!! Form::close() !!}