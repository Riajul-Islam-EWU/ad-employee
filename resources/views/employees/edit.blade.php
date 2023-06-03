@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>

    <form id="employeeForm" action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}" required>
        </div>

        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" class="form-control" value="{{ $employee->salary }}"
                required>
        </div>

        <!-- Edit Employee Button -->
        <button class="btn btn-primary mb-3" id="editEmployeeButton" data-bs-toggle="modal"
            data-bs-target="#confirmationModal">Edit Employee</button>
    </form>



    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to update this employee?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmEditEmployeeButton">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var editEmployeeButton = document.querySelector("#editEmployeeButton");
            var confirmEditEmployeeButton = document.querySelector("#confirmEditEmployeeButton");

            // Prevent the default form submission
            editEmployeeButton.addEventListener("click", function(event) {
                event.preventDefault();
            });

            // Submit the form when clicking the "Confirm" button in the modal
            confirmEditEmployeeButton.addEventListener("click", function() {
                // Get the form element
                var form = document.querySelector("#employeeForm");

                // Submit the form
                form.submit();
            });
        });
    </script>
@endsection
