@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Companies') }}</div>
            <div class="card-body">
              @yield('companies_content')
            </div>
        </div>
    </div>
</div>
@endsection