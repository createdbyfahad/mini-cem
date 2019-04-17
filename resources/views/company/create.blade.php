@extends('layouts.companies')

@section('companies_content')
@include('layouts.errors')
<form action="{{route('companies.store')}}" method="POST" class="col-md-8 offset-md-2" enctype="multipart/form-data">
  @csrf

  <div class="form-group row">
    <label for="inputLogo" class="col-sm-2 col-form-label">{{__('Logo')}}</label>
    <div class="col-sm-10">
      <input type="file" name="logo" class="form-control" id="inputLogo" placeholder="{{__('Logo')}}" />
    </div>
  </div>

  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">{{__('Name')}}</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="inputName" placeholder="{{__('Name')}}" value="{{old('name')}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">{{__('Email')}}</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="{{__('Email')}}" value="{{old('email')}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inpuWebsite" class="col-sm-2 col-form-label">{{__('Website')}}</label>
    <div class="col-sm-10">
      <input type="text" name="website" class="form-control" id="inputWebsite" placeholder="{{__('Website')}}" value="{{old('website')}}">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </div>
</form>
@endsection