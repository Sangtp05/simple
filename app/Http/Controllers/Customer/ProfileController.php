<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCustomerProfileRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Services\BreadcrumbService;
class ProfileController extends Controller
{
    protected $breadcrumbService;
    public function __construct(BreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }

    public function show()
    {
        $customer = auth('customer')->user();
        $this->breadcrumbService->add('Thông tin cá nhân');
        return view('customer.profile.show', compact('customer'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed'
        ]);


        // Remove password from validated data if it's empty
        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        /** @var Customer $customer */
        $customer = auth('customer')->user();
        
        $customer->update($validated);

        return redirect()->back()->with('success', 'Thông tin đã được cập nhật thành công!');
    }

    public function check()
    {
        return response()->json([
            'authenticated' => auth()->guard('customer')->check()
        ]);
    }
}
