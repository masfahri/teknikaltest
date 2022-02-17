@extends('layouts.app')
@section('css-third')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p class="float-right">
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Cari
                    </a>
                    
                </p>
                <div class="collapse float-right" id="collapseExample">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-12">
                                <p style="color:white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae earum qui quisquam molestiae a natus ratione, consectetur animi iste corrupti magni, libero sint cum aperiam magnam maiores voluptatibus nobis aut?</p>
                                <form action="{{route('cari')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="daterange" value="01/01/2018 - 01/15/2018" />
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="dari">Dari</label>
                                            {!! Form::text('dari', '', ['id' => 'dari', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-6">
                                            <label for="sampai">Sampai</label>
                                            {!! Form::text('sampai', '', ['id' => 'sampai', 'class' => 'form-control']) !!}
                                        </div>
                                        
                                        
                                    </div><br>
                                    {!! Form::submit('Cari Transaksi', ['class' => 'btn btn-success btn-sm float-right']) !!}
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @include('layouts.partial.card-dashboard')
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('components.tables._home')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js-third')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                showDropdowns: true,
                startDate: "02/12/2022",
                endDate: "02/18/2022",
                opens: "center",
                drops: "down"
                }, function(start, end, label) {
                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                    $('#dari').val(start.format('YYYY-MM-DD'));
                    $('#sampai').val(end.format('YYYY-MM-DD'));
                });        
            } );

    </script>
@endsection