@extends('layouts.employees')

@section('employees_content')
@include('layouts.errors')
<form action="{{route('employees.store')}}" method="POST" class="col-md-8 offset-md-2">
  @csrf
  <div class="form-group row">
    <label for="inputCompany" class="col-sm-2 col-form-label">{{__('Company')}}</label>
    <div class="col-sm-10">
      <select class="form-control" id="inputCompany" name="company">
        @foreach($companies as $company)
          <option value="{{$company->id}}">{{$company->name}}</option>
        @endforeach
      </select>
    </div>
  </div>   
  
  <div class="form-group row">
    <label for="inputFirstName" class="col-sm-2 col-form-label">{{__('First Name')}}</label>
    <div class="col-sm-10">
      <input type="text" name="first_name" class="form-control" id="inputFirstName" placeholder="{{__('First Name')}}" value="{{old('first_name')}}">
    </div>
  </div>  

  <div class="form-group row">
    <label for="inputLastName" class="col-sm-2 col-form-label">{{__('Last Name')}}</label>
    <div class="col-sm-10">
      <input type="text" name="last_name" class="form-control" id="inputLastName" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">{{__('Email')}}</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="{{__('Email')}}" value="{{old('email')}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPhone" class="col-sm-2 col-form-label">{{__('Phone')}}</label>
    <div class="col-sm-10">
      <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="{{__('Phone')}}" value="{{old('phone')}}">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </div>
</form>
@endsection