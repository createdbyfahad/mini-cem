@extends('layouts.companies')

@section('companies_content')
<div class="row buttons_panel">
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{route('companies.create')}}" role="button">{{ __('Add Company') }}</a>
    </div>
</div>
<table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__('Name')}}</th>
      <th scope="col">{{__('Email')}}</th>
      <th scope="col">{{__('Total Employees')}}</th>
      <th scope="col">{{__('Website')}}</th>
      <th scope="col">{{__('Logo')}}</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
          <th scope="row">{{$company->id}}</th>
          <td><a href="{{route('companies.show', $company->id)}}">{{$company->name}}</a></td>
          <td>{{$company->email}}</td>
          <td>{{$company->employees_count}}</td>
          <td>{{$company->website}}</td>
          <td>@if ($company->logo_name) Yes @else No @endif</td>
          <td>
            <a href="{{route('companies.edit', $company->id)}}" class="btn btn-outline-secondary">
              Update
            </a>
          </td>
          <td>
            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" class="btn btn-outline-danger" value="Delete" />
            </form>
          </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="paginator row justify-content-center">{{$companies->links()}}</div>
@endsection