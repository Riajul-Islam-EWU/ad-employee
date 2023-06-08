@extends('layout')

@section('content')
    <div class="container">
        <h2>Add New Customer</h2>
        <form method="POST" action="{{ route('customers.store') }}">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
            </div>
            <div class="form-group">
                <label for="district">District:</label>
                <input type="text" class="form-control" id="district" name="district" value="{{ old('district') }}" required>
            </div>
            <div class="form-group">
                <label for="division">Division:</label>
                <input type="text" class="form-control" id="division" name="division" value="{{ old('division') }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Customer</button>
        </form>
    </div>
@endsection
