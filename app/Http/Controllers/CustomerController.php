<?php

namespace App\Http\Controllers;

// use App\Customer;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = DB::table('customers')
            ->orderBy('first_name', 'asc')
            ->get();

        return view('customers.index', compact('customers'));
    }

    // public function index()
    // {
    //     $customers = Customer::all();
    //     return view('customers.index', compact('customers'));
    // }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'district' => 'required',
            'division' => 'required',
            'phone' => 'required',
        ]);

        $customer = new Customer();
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->address = $request->input('address');
        $customer->district = $request->input('district');
        $customer->division = $request->input('division');
        $customer->phone = $request->input('phone');
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer added successfully');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'district' => 'required',
            'division' => 'required',
            'phone' => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->address = $request->input('address');
        $customer->district = $request->input('district');
        $customer->division = $request->input('division');
        $customer->phone = $request->input('phone');
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function getData(Customer $customer)
    {
        return response()->json([
            'address' => $customer->address,
            'district' => $customer->district,
            'division' => $customer->division,
            'phone' => $customer->phone,
        ]);
    }
}
