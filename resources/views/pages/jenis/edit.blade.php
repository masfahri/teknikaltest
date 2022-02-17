@extends('layouts.app')
@section('css-third')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                @include('layouts.partial.alerts')
                <div class="card-body">
                    @include('components.form.e_jenis')
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    @include('components.tables._jenis')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-third')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        function edit(params) {
            console.log(params[0]);
            $('select[name=jenis_id]').val(params[0].jenis_id);
            $('input[name=amount]').val(params[0].amount);
            $('input[name=id]').val(params[0].id);
            $('textarea[name=deskripsi_pengeluaran]').val(params[0].deskripsi_pengeluaran);
        }
    </script>
@endsection