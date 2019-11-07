@extends('parent')

@section('main')

<div align="right">
  <a href="{{ route('lacrud.create')}}" class="btn btn-success btn-sm">Add</a>
</div>
<br />
@if($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-striped">
 <tr>
  <th width="10%">Image</th>
  <th width="10%">First Name</th>
  <th width="10%">Last Name</th>
  <th width="20%">Date of Birth</th>
  <th width="15%">Email</th>
  <th width="10%">Phone</th>
  <th width="30%">Action</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->first_name }}</td>
   <td>{{ $row->last_name }}</td>
   <td></td>
   <td></td>
   <td></td>
   <td>
      <form action="{{ route('lacrud.destroy', $row->id) }}" method="post">
        <a href="{{ route('lacrud.show', $row->id) }}" class="btn btn-primary">Show</a>
        <a href="{{ route('lacrud.edit', $row->id) }}" class="btn btn-warning">Edit</a>
          @csrf
          @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection
