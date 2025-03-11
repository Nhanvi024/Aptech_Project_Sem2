<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DiscountUse;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class DiscountController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'pageTitle' => 'Discount',
        ];
        //$discounts = Discount::all();
        $query = Discount::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }
        $search = $request->input('search');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('code', 'LIKE', '%' . $search . '%');
            });
        }
        $discounts = $query->paginate(10)->appends(request()->query());
        return view("back.pages.discount.admin.index", $data, compact('discounts'));
    }


    public function create()
    {
        $data = [
            'pageTitle' => 'Discount',
        ];
        $discounts = Discount::all();
        return view("back.pages.discount.admin.create", $data, compact("discounts"));
    }

    public function store(Request $request)
    {

        $request->validate([
            'code' => [
                'required',
                'string',
                'unique:discounts,code'
            ],
            'name' => 'required',
            'type' => 'required|in:fixed,percent',
            'discount_value' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->type === 'percent' && ($value < 1 || $value > 100)) {
                        $fail('Percent must be from 1-100');
                    } elseif ($request->type === 'fixed' && $value < 1) {
                        $fail('Fixed price must greater than 0');
                    }
                }
            ],
            'max_discount_value' =>  [
                'required',
                'numeric',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->type === 'fixed' && $value != $request->discount_value) {
                        $fail('Max Discount Value equal to Discount Value when choose Fixed.');
                    }
                }
            ],
            'quantity' => 'required|numeric|min:1|max:100000',
            'condition' => 'required|numeric|min:1',
            'max_uses' => [
                'required',
                'numeric',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value > $request->quantity) {
                        $fail('Max usage can not greater than quantity');
                    }
                }
            ],
            'starts_at' => [
                'required',
                'after_or_equal:today'
            ],
            'expires_at' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if (Carbon::parse($value)->isPast()) {
                        $fail('Expires date must be after today');
                    }
                    if (Carbon::parse($value) < Carbon::parse($request->starts_at)) {
                        $fail('Expires date must be after start date');
                    }
                }
            ],
        ]);
        Discount::create([
            'code' => $request->code,
            'name' => $request->name,
            'type' => $request->type,
            'discount_value' => $request->discount_value,
            'max_discount_value' => $request->max_discount_value,
            'quantity' => $request->quantity,
            'condition' => $request->condition,
            'max_uses' => $request->max_uses,
            'starts_at' => Carbon::parse($request->starts_at),
            'expires_at' => Carbon::parse($request->expires_at),

        ]);

        return redirect()->route('admin.discount.index')->with('message', 'Discount create successfully');
    }


    public function update($id)
    {
        $discount = Discount::find($id);

        $discount->update([
            'status' => !($discount->status)
        ]);

        return redirect()->route('admin.discount.index')->with('success', 'Status updated successfully!');
    }

 
}
