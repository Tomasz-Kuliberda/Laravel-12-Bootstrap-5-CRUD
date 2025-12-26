@extends('layouts.app')

@section('title', 'Companies List')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-white">Companies List</h2>
    <a href="{{ route('companies.create') }}" class="btn btn-outline-info mb-3">Add Company</a>
    @include('sweetalert::alert')
    <table class="table table-bordered table-dark table-striped">
        <thread>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thread>
        <tbody>
        @forelse ($companies as $company)
    <tr>
        <td>{{ $company->id }}</td>
        <td>{{ $company->name }}</td>
        <td>{{ $company->email }}</td>
        <td>
            <a href="{{ route('companies.show', $company->id) }}" class="btn btn-outline-warning">View</a>
            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-outline-info">Edit</a>
            <button type="button" class="btn btn-outline-danger delete-btn"
                data-bs-toggle="modal" data-bs-target="#deleteCompanyModal"
                data-route="{{ route('companies.destroy', $company->id) }}"
            >Delete</button>
        </td>
    </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No company found!</td>
        </tr>
    @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-4">
        {{ $companies->links('vendor.pagination.bootstrap-5-dark') }}
    </div>
</div>
<div class="modal fade" id="deleteCompanyModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h5 class="modla-title">Delete Company?</h5>
                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <p>You're about to delete this company.</p>
                <p>This action cannot be reversed.</p>
            </div>
            <div class="modal-footer border-0">
                <button
                    type="button"
                    class="btn btn-outline-light"
                    data-bs-dismiss="modal"
                >Cancel</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Delete Company
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const deleteForm = document.getElementById("deleteForm");
        deleteButtons.forEach(button=>{
            button.addEventListener('click', function(){
                const deleteUrl = this.dataset.route;
                deleteForm.action = deleteUrl;
            });
        });
    });
</script>
@endsection