@extends('layouts.app')

@section('title', 'Add Company')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-3">

            <h2 class="text-white m-0">Add Company</h2>
            <a href="{{ route('companies.index') }}" class="btn btn-outline-warning mt-2">Back</a>

            <div class="card bg-dark text-white mt-4">
                <div class="card-body border border-light rounded">
                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text"
                            name="name"
                            class="form-control bg-dark text-white @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text"
                            name="email"
                            class="form-control bg-dark text-white @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Website</label>
                            <input type="text"
                            name="website"
                            class="form-control bg-dark text-white @error('website') is-invalid @enderror"
                            value="{{ old('website') }}">
                            @error('website')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company Logo</label>
                            <input type="file" name="logo" class="form-control">
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if (!empty($company->logo))
                                <img src="{{ asset('storage/' . $company->logo) }}" class="mt-2" width="300">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-outline-success text-white">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection