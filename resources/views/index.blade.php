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
  <th width="35%">First Name</th>
  <th width="35%">Last Name</th>
  <th width="30%">Action</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->first_name }}</td>
   <td>{{ $row->last_name }}</td>
   <td>

   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection
