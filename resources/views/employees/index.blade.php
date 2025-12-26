@extends('layouts.app')

@section('title', 'Employees List')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-white">Employees List</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-outline-info mb-3">Add Employee</a>
    @include('sweetalert::alert')
    <table class="table table-bordered table-dark table-striped">
        <thread>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thread>
        <tbody>
        @forelse ($employees as $employee)
    <tr>
        <td>{{ $employee->id }}</td>
        <td>{{ $employee->first_name }}</td>
        <td>{{ $employee->last_name }}</td>
        <td>{{ $employee->company->name }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->phone }}</td>
        <td>
            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-outline-warning">View</a>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-outline-info">Edit</a>
            <button type="button" class="btn btn-outline-danger delete-btn"
                data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal"
                data-route="{{ route('employees.destroy', $employee->id) }}"
            >Delete</button>
        </td>
    </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center">No employee found!</td>
        </tr>
    @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end mt-4">
        {{ $employees->links('vendor.pagination.bootstrap-5-dark') }}
    </div>
</div>
<div class="modal fade" id="deleteEmployeeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h5 class="modla-title">Delete Employee?</h5>
                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <p>You're about to delete this employee.</p>
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
                        Delete Employee
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