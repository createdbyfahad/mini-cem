@extends('layouts.companies')

@section('companies_content')
@include('layouts.errors')
<form action="{{route('companies.update', $company->id)}}" method="POST" class="col-md-8 offset-md-2">
  @method('PATCH')
  @csrf
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">{{__('Name')}}</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" id="inputName" placeholder="{{__('Name')}}" value="{{ $company->name }}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">{{__('Email')}}</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="{{__('Email')}}" value="{{ $company->email }}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inpuWebsite" class="col-sm-2 col-form-label">{{__('Website')}}</label>
    <div class="col-sm-10">
      <input type="text" name="website" class="form-control" id="inputWebsite" placeholder="{{__('Website')}}" value="{{ $company->website }}">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
@endsection