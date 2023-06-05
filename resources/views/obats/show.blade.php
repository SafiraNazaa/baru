@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Obat</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('obats.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Obat:</strong>
                {{ $obat->kode }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Obat:</strong>
                {{ $obat->namaobat }}
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dosis:</strong>
                {{ $obat->dosis }}
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Efek Samping:</strong>
                @foreach ($jenis as $item)
                        @if ($item->id === $obat->jenis_obat)
                            {{ $item->jenisobat }}
                        @endif
                @endforeach
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori:</strong>
                @foreach ($kategori as $item)
                        @if ($item->id === $obat->kategori)
                            {{ $item->bentukobat }}
                        @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection