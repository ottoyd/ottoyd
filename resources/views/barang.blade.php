@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
        <th>Nama Barang</th>
        <th>Pelapor</th>
        <th>Penemu</th>
        <th>Tgl</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($barangs as $barang) 
        <tr>
            <td>{{ $barang->nama }}</td>
            <td>
                @if($barang->pelapor)
                    {{ $barang->pelapor->nama }}
                @else
                    <a href="{{ url('barang', [ $barang->id, 'edit' ]) }}">claim</a>
                @endif
            </td>
            <td>
                @if($barang->penemu)
                    {{ $barang->penemu->nama }}
                @else
                    <a href="{{ url('barang', [ $barang->id, 'edit' ]) }}">claim</a>
                @endif
            </td>
            <td>{{ $barang->created_at }}</td>
            <td>
                @if($barang->pelapor)
                    <a target="_blank" href="{{ url('storage/barang', [ basename($barang->foto_bukti) ]) }}">foto</a>
                @elseif($barang->penemu)
                    <a target="_blank" href="{{ url('storage/barang', [ basename($barang->foto_barang) ]) }}">foto</a>
                @endif
                
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection
