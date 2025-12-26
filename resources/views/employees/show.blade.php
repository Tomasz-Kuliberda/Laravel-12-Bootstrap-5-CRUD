@extends('layouts.app')

@section('title', 'Employees Details')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h1 class="text-white">Employees Details</h1>
            <div class="card bg-dark text-white mt-4">
                <div class="card-body border border-success rounded">
                    <h5 class="card-title"><strong>First Name:</strong> {{ $employee->first_name }} </h5>
                    <h5 class="card-title"><strong>Last Name:</strong> {{ $employee->last_name }} </h5>
                    <p class="card-text"><strong>Company Name:</strong> {{ $employee->company->name }} </p>
                    <p class="card-text"><strong>Email:</strong> {{ $employee->email }} </p>
                    <p class="card-text"><strong>Phone Number:</strong> {{ $employee->phone }} </p>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection