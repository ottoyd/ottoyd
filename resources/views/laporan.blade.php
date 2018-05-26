@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Laporan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/barang') }}" enctype="multipart/form-data">
                        @csrf

                        @isset($barang)
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="id" value="{{ $barang->id  }}"/>
                        @endif

                        <input type="hidden" name="pelapor_id" value="{{ isset($pelapor) ? $pelapor->id : null  }}"/>
                        <input type="hidden" name="penemu_id" value="{{ isset($penemu) ? $penemu->id : null  }}"/>

                        @if(!isset($barang))
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Barang') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto Bukti/Barang') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" required>

                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
