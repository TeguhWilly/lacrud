@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<div align="right">
 <a href="{{ route('lacrud.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('lacrud.store') }}" enctype="multipart/form-data">

 @csrf
 <div class="container">


<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
  <!--<a href="" class="float-right btn btn-outline-primary mt-1">Log in</a>-->
  <h4 class="card-title mt-2">Add data</h4>
</header>
<article class="card-body">
<form>
  <div class="form-row">
    <div class="col form-group">
      <label>First name </label>
        <input type="text" class="form-control" name="first_name">
    </div> <!-- form-group end.// -->
    <div class="col form-group">
      <label>Last name</label>
        <input type="text" class="form-control" name="last_name">
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

    <form>
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload Photo</label>
    <input type="file" class="form-control-file" name="image">
  </div>
</form>
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
        <input type="submit" name="add" class="btn btn-primary input-lg" value="Submit" />
    </div> <!-- form-group// -->

</form>
</article> <!-- card-body end .// -->
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div>
<!--container end.//-->

@endsection
