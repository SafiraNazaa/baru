@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Obat</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('obats.create') }}"> Create New Obat</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Dosis</th>
            <th>Efek Samping </th>
            <th>Jenis </th>
            <th>Bentuk Obat </th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($obats as $obat)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $obat->kode }}</td>
            <td>{{ $obat->namaobat }}</td>
            <td>{{ $obat->dosis }}</td>
            <td>{{ $obat->efek }}</td>
            <td>
                @foreach ($jenis as $item)
                        @if ($item->id === $obat->jenis_obat)
                            {{ $item->jenisobat }}
                        @endif
                @endforeach
            </td>
            <td>
                @foreach ($kategori as $item)
                        @if ($item->id === $obat->kategori)
                            {{ $item->bentukobat }}
                        @endif
                @endforeach
            </td>
            <td>
                <form action="{{ route('obats.destroy',$obat->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('obats.show',$obat->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('obats.edit',$obat->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection