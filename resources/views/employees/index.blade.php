@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employee Management</h1>

        <!-- Add Employee Button -->
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3" data-bs-toggle="modal"
            data-bs-target="#confirmationModal">Add Employee</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm"
                                data-toggle="modal" data-target="#confirmationModal">Edit</a>
                            <!-- Delete Employee Button -->
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                id="deleteForm{{ $employee->id }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm delete-button" data-bs-toggle="modal"
                                    data-bs-target="#confirmationModal{{ $employee->id }}">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal{{ $employee->id }}" tabindex="-1"
        aria-labelledby="confirmationModalLabel{{ $employee->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel{{ $employee->id }}">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this employee?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger confirm-delete-button"
                        data-employee-id="{{ $employee->id }}">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteButtons = document.querySelectorAll(".delete-button");
            var confirmDeleteButtons = document.querySelectorAll(".confirm-delete-button");

            // Prevent the default form submission
            deleteButtons.forEach(function(deleteButton) {
                deleteButton.addEventListener("click", function(event) {
                    event.preventDefault();
                });
            });

            // Add event listeners to confirm delete buttons
            confirmDeleteButtons.forEach(function(confirmDeleteButton) {
                confirmDeleteButton.addEventListener("click", function() {
                    var employeeId = confirmDeleteButton.getAttribute("data-employee-id");
                    var deleteForm = document.querySelector("#deleteForm" + employeeId);
                    deleteForm.submit();
                });
            });
        });
    </script>
@endsection
