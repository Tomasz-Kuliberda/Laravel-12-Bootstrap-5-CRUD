@extends('layouts.app')

@section('title', 'Edit Employee')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-3">

            <h2 class="text-white m-0">Edit Employee</h2>
            <a href="{{ route('employees.index') }}" class="btn btn-outline-warning mt-2">Back</a>

            <div class="card bg-dark text-white mt-4">
                <div class="card-body border border-light rounded">
                    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text"
                            name="first_name"
                            class="form-control bg-dark text-white @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name', $employee->first_name) }}">
                            @error('first_name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text"
                            name="last_name"
                            class="form-control bg-dark text-white @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name', $employee->last_name) }}">
                            @error('last_name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company</label>
                            <select name="company_id" class="form-select bg-dark text-white">
                                <option value="">{{ $employee->company->name ?? 'Choose Company'}}</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text"
                            name="email"
                            class="form-control bg-dark text-white @error('email') is-invalid @enderror"
                            value="{{ old('email', $employee->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text"
                            name="phone"
                            class="form-control bg-dark text-white @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $employee->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-success text-white">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection