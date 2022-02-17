@extends('layouts.app')

@section('content')
<div class="container">
    @component('layouts.partial.alerts')
        
    @endcomponent
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Data Nomor Handphone') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.form._phones')
                        
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.scripts._phones')

@endsection
