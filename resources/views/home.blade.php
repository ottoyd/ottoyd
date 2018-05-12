@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div align="center" class="card-header"> <h3>SISTEM LAPORAN KEHILANGAN SURAT-SURAT BERHARGA </h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                                <a href ="/"> <img src="Found.png"></a>
                                <a href ="/"> <img src="Lost.png"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
