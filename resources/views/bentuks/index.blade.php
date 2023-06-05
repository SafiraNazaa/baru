@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel with Fariska</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('bentuks.create') }}"> Create New Bentuk</a>
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
            <th>Kode Bentuk</th>
            <th>Bentuk Obat</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($bentuks as $bentuk)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $bentuk->kodebentuk }}</td>
            <td>{{ $bentuk->bentukobat }}</td>
            <td>
                <form action="{{ route('bentuks.destroy',$bentuk->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('bentuks.show',$bentuk->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('bentuks.edit',$bentuk->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $bentuks->links() !!}
      
@endsection