@extends('layouts.employees')

@section('employees_content')
@include('layouts.errors')
<form action="{{route('employees.update', $employee->id)}}" method="POST" class="col-md-8 offset-md-2">
  @method('PATCH')
  @csrf
  <div class="form-group row">
    <label for="inputCompany" class="col-sm-2 col-form-label">{{__('Company')}}</label>
    <div class="col-sm-10">
      <select class="form-control" id="inputCompany" name="company">
        @foreach($companies as $company)
          <option @if($employee->company_id == $company->id) selected @endif value="{{$company->id}}">{{$company->name}}</option>
        @endforeach
      </select>
    </div>
  </div>   
  
  <div class="form-group row">
    <label for="inputFirstName" class="col-sm-2 col-form-label">{{__('First Name')}}</label>
    <div class="col-sm-10">
      <input type="text" name="first_name" class="form-control" id="inputFirstName" placeholder="{{__('First Name')}}" value="{{$employee->first_name}}">
    </div>
  </div>  

  <div class="form-group row">
    <label for="inputLastName" class="col-sm-2 col-form-label">{{__('Last Name')}}</label>
    <div class="col-sm-10">
      <input type="text" name="last_name" class="form-control" id="inputLastName" placeholder="{{__('Last Name')}}" value="{{$employee->last_name}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">{{__('Email')}}</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="{{__('Email')}}" value="{{$employee->email}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPhone" class="col-sm-2 col-form-label">{{__('Phone')}}</label>
    <div class="col-sm-10">
      <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="{{__('Phone')}}" value="{{$employee->phone}}">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
@endsection