@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel bersama Fariska</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('jenis.create') }}"> Create New Jenis</a>
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
            <th>Jenis Obat</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($jenis as $jenis)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $jenis->kodeobat }}</td>
            <td>{{ $jenis->jenisobat }}</td>
            <td>
                <form action="{{ route('jenis.destroy',$jenis->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('jenis.show',$jenis->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('jenis.edit',$jenis->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection