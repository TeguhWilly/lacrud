
@extends('parent')

@section('main')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div align="right">
                <a href="{{ route('lacrud.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />


<div class="container">


<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
  <!--<a href="" class="float-right btn btn-outline-primary mt-1">Log in</a>-->
  <h4 class="card-title mt-2">Edit data</h4>
</header>
<article class="card-body">
<form method="post" action="{{ route('lacrud.update', $data->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

  <div class="form-row">

    <div class="col form-group">
      <label>First name </label>
        <input type="text" class="form-control" name="first_name" value="{{ $data->first_name }}">
    </div> <!-- form-group end.// -->
    <div class="col form-group">
      <label>Last name</label>
        <input type="text" class="form-control" name="last_name" value="{{ $data->last_name }}" >
    </div> <!-- form-group end.// -->
  </div> <!-- form-row end.// -->
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" placeholder="">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div> <!-- form-group end.// -->
  <div class="form-group">
      <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" value="option1">
      <span class="form-check-label"> Male </span>
    </label>
    <label class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="gender" value="option2">
      <span class="form-check-label"> Female</span>
    </label>


  <div class="form-group">
    <label>Upload Photo</label>
    <input type="file" class="form-control-file" name="image" />
    <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
    <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
  </div>

  </div> <!-- form-group end.// -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Date of Birth</label>
      <input type="text" class="form-control">
    </div> <!-- form-group end.// -->
    <div class="form-group col-md-6">
      <label>Phone number</label>
      <input type="text" class="form-control">
    </div> <!-- form-group end.// -->
  </div> <!-- form-row.// -->

    <div class="form-group">
        <input type="submit" name="reset" class="btn btn-warning input-lg" value="Reset" />
        <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
    </div> <!-- form-group// -->

</form>
</article> <!-- card-body end .// -->
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div>
<!--container end.//-->

@endsection
