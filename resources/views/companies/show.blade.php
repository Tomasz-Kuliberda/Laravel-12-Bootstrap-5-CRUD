@extends('layouts.app')

@section('title', 'Companies Details')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h1 class="text-white">Companies Details</h1>
            <div class="card bg-dark text-white mt-4">
                <div class="card-body border border-success rounded">
                    <h5 class="card-title"><strong>Name:</strong> {{ $company->name }} </h5>
                    <p class="card-text"><strong>Email:</strong> {{ $company->email }} </p>
                    <p class="card-text"><strong>Website:</strong> {{ $company->website }} </p>
                    @if($company->logo)
                        <img src="{{ asset('storage/' . $company->logo) }}" width="250" class="mb-3">
                    @endif
                    <div><a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to list</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection