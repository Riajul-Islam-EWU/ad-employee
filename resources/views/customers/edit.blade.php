@extends('layout')

@section('content')
    <div class="container">
        <h2>Edit Customer</h2>
        <form method="POST" action="{{ route('customers.update', $customer->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $customer->first_name }}" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $customer->last_name }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}" required>
            </div>
            <div class="form-group">
                <label for="district">District:</label>
                <input type="text" class="form-control" id="district" name="district" value="{{ $customer->district }}" required>
            </div>
            <div class="form-group">
                <label for="division">Division:</label>
                <input type="text" class="form-control" id="division" name="division" value="{{ $customer->division }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Customer</button>
        </form>
    </div>
@endsection
