@extends('layout')

@section('content')
    <div class="container">
        <h2>Customer Profile</h2>
        <div class="card mb-3">
            <div class="card-header">
                <h4>{{ $customer->first_name }} {{ $customer->last_name }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Address:</strong> <span id="address">{{ $customer->address }}</span></p>
                <p><strong>District:</strong> <span id="district">{{ $customer->district }}</span></p>
                <p><strong>Division:</strong> <span id="division">{{ $customer->division }}</span></p>
                <p><strong>Phone:</strong> <span id="phone">{{ $customer->phone }}</span></p>
            </div>
        </div>

        <h2>Purchase History</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Add dummy data here --}}
                    <tr>
                        <td>1</td>
                        <td>Product A</td>
                        <td>2</td>
                        <td>$10</td>
                        <td>2023-06-10</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Product B</td>
                        <td>1</td>
                        <td>$20</td>
                        <td>2023-06-11</td>
                    </tr>
                    {{-- End of dummy data --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{-- Not in use right now --}}
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewProfileBtns = document.querySelectorAll('.view-profile-btn');

            viewProfileBtns.forEach(function(btn) {
                btn.addEventListener('click', function(event) {
                    event.preventDefault();
                    const customerId = this.getAttribute('href').split('/').pop();

                    fetchCustomerData(customerId);
                });
            });

            function fetchCustomerData(customerId) {
                // Replace the URL with the endpoint that fetches the customer data based on the customer ID
                const url = `/customers/${customerId}/data`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => populateCustomerData(data))
                    .catch(error => console.error('Error:', error));
            }

            function populateCustomerData(data) {
                document.getElementById('address').textContent = data.address;
                document.getElementById('district').textContent = data.district;
                document.getElementById('division').textContent = data.division;
                document.getElementById('phone').textContent = data.phone;
            }
        });
    </script>
@endsection
