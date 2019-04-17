@extends('layouts.companies')

@section('companies_content')
@include('layouts.errors')
<div class="col-md-10 offset-md-1">
  @method('PATCH')
  @csrf
  @if($company->logo_name) <div class="col-md-4 offset-md-4"><img class="company-logo col-md-12" src="{{URL::to('/').'/storage/'.$company->logo_name}}" /></div> @endif
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">{{__('Name')}}</label>
    <div class="col-sm-10">
      <b>{{$company->name}}</b>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">{{__('Email')}}</label>
    <div class="col-sm-10">
      {{$company->email}}
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">{{__('Website')}}</label>
    <a href="{{$company->website}}">{{$company->website}}</a>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">{{__('Employees')}}</label>
    <div class="col-sm-10">
      <ul>
      @foreach($company->employees as $employee)
        <li>{{$employee['first_name']}} {{$employee['last_name']}}</li>
      @endforeach
      </ul>
    </div>
  </div>

</div>
@endsection