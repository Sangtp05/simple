<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCustomerProfileRequest;

class ProfileController extends Controller
{
    public function show()
    {
        $customer = auth('customer')->user();
        return view('customer.profile.show', compact('customer'));
    }

    public function update(UpdateCustomerProfileRequest $request)
    {
        $customer = auth('customer')->user();
        
        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Thông tin đã được cập nhật thành công!');
    }
}