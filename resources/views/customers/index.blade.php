@extends('layout')

@section('content')
    <div class="container">
        <h2>Customer List</h2>
        <div class="mb-3">
            <input type="text" class="form-control" id="search-input" placeholder="Search by name or phone number...">
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Division</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->district }}</td>
                            <td>{{ $customer->division }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <a href="{{ route('customers.show', $customer->id) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> View Profile
                                </a>
                                <a href="{{ route('customers.edit', $customer->id) }}"
                                    class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const tableRows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function() {
                const searchValue = this.value.toLowerCase();

                tableRows.forEach(function(row) {
                    const firstName = row.cells[1].innerText.toLowerCase();
                    const lastName = row.cells[2].innerText.toLowerCase();
                    const phone = row.cells[6].innerText.toLowerCase();

                    if (firstName.includes(searchValue) || lastName.includes(searchValue) || phone.includes(searchValue)) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
