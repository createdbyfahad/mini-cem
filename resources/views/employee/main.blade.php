@extends('layouts.employees')

@section('employees_content')
<div class="row buttons_panel">
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{route('employees.create')}}" role="button">{{ __('Add Employee') }}</a>
    </div>
</div>
<table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__('Company')}}</th>
      <th scope="col">{{__('Name')}}</th>
      <th scope="col">{{__('Email')}}</th>
      <th scope="col">{{__('Phone')}}</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
          <th scope="row">{{$employee->id}}</th>
          <td><a href="{{route('companies.show', $employee->company->id)}}">{{$employee->company->name}}</a></td>
          <td>{{$employee->first_name}} {{$employee->last_name}}</td>
          <td>{{$employee->email}}</td>
          <td>{{$employee->phone}}</td>
          <td>
            <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-outline-secondary">
              Update
            </a>
          </td>
          <td>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" class="btn btn-outline-danger" value="Delete" />
            </form>
          </td>
        </tr>
    @endforeach
  </tbody>
</table>

<div class="paginator row justify-content-center">{{$employees->links()}}</div>
@endsection