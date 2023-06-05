@extends('layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Obat</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('obats.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('obats.update',$obat->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Obat:</strong>
                    <input type="text" name="kode" value="{{ $obat->kode }}" class="form-control" placeholder="Kode Obat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Obat:</strong>
                    <input type="text" name="namaobat" value="{{ $obat->namaobat }}" class="form-control" placeholder="Nama Obat">
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dosis :</strong>
                    <input type="text" name="dosis" value="{{ $obat->dosis }}" class="form-control" placeholder="Dosis">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Efek Samping :</strong>
                    <input type="text" name="efek" value="{{ $obat->efek }}" class="form-control" placeholder="Efek Samping">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Obat:</strong>
                    <select name="jenis_obat">
                        @foreach ($jenis as $item)
                            <option value="{{ $item->id }}" 
                                @if ($item->id == $obat->jenis_obat) selected @endif>
                                        {{ $item->jenisobat}}
                            </option>
                        @endforeach
                    </select>
                </div>            
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bentuk Obat:</strong>
                    <select name="kategori">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" 
                                @if ($item->id == $obat->kategori) selected @endif>
                                        {{ $item->bentukobat}}
                            </option>
                        @endforeach
                    </select>
                </div>                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection