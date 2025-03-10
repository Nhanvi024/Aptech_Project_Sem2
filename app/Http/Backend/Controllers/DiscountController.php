<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DiscountUse;
use App\Models\User;

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
            'quantity' => 'required|numeric|min:1|max:10000',
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

    public function applyDiscount(Request $request)
    {
        $userId = User::where('id', $request->userId)->value('id');
        if (!$userId) {
            return back()->with('message', 'User not found!');
        }
        $request->validate([
            'code' => 'required|exists:discounts,code' // Kiểm tra mã giảm giá có tồn tại không
        ]);

        $discount = Discount::where('code', $request->code)
            ->where('starts_at' ,'<=',now())
            ->where('expires_at', '>', now())
            ->first();

        //Kiểm tra xem voucher có sử dụng được hay không
        if (!$discount) {
            return back()->with('message', 'Invalid discount code!');
        }

        if ($discount->status == 0) {
            return back()->with('message', 'Discount code unvailable!');
        }

        // Kiểm tra số lần user đã sử dụng
        $userUsage = DiscountUse::where('user_id', $userId)
            ->where('discount_id', $discount->id)
            ->first();


        if (isset($userUsage) && $userUsage->uses >= $discount->max_uses) {
            return back()->with('message', 'You have reached the maximum uses of this discount');
        }

        if ($discount->quantity == 0) {
            return back()->with('message', 'Discount code has been fully redeemed.');
        }

        if ($discount->condition > $request->subtotal_price) {
            return back()->with('message', 'CHUA DU DIEU KIEN');
        }

        $discount_amount = 0;
        $subtotal_price = $request->subtotal_price;
        $discounted_price = 0;
        if ($discount->type == 'percent') {
            $discount_amount = ($subtotal_price * $discount->discount_value) / 100;
            if ($discount_amount <= $discount->max_discount_value) {
                $discounted_price = $subtotal_price - $discount_amount;
            } elseif ($discount_amount > $discount->max_discount_value) {
                $discounted_price = $subtotal_price - $discount->max_discount_value;
            }
        } else {
            $discount_amount = $discount->discount_value;
            $discounted_price = $subtotal_price - $discount_amount;
        }
        $discounted_price = max(0, $subtotal_price - $discount_amount);



        // Trừ số lượng discount
        $discount->decrement('quantity');

        // Cập nhật lượt sử dụng của user
        if ($userUsage) {
            $userUsage->increment('uses');
        } else {
            DiscountUse::create([
                'user_id'     => $userId,
                'discount_id' => $discount->id,
                'uses'        => 1
            ]);
        }

        // Lưu mã giảm giá vào session
        session(['discount' => [
            'discount_amount' => $discount_amount,
            'discounted_price' => $discounted_price,
            'discount_id' => $discount->id,
            'user_id' => $userId
        ]]);

        return back()->with('message', 'Discount applied successfully!');
    }



    public function test()
    {
        $data = [
            'pageTitle' => 'Discount',
        ];
        $discounts = Discount::all();

        return view("back.pages.discount.admin.test", compact("discounts", 'data'));
    }

    public function removeDiscount()
    {
        // Lấy thông tin discount từ session
        $discountData = session('discount');

        // Nếu không có discount trong session thì không làm gì cả
        if (!$discountData) {
            return back()->with('message', 'No discount applied.');
        }

        $discount = Discount::find($discountData['discount_id']);
        $userId = $discountData['user_id'];

        // Nếu discount tồn tại, cập nhật lại số lượng
        if ($discount) {
            $discount->increment('quantity'); // Tăng lại số lượng
        }

        // Giảm số lần sử dụng của user nếu có
        $userUsage = DiscountUse::where('user_id', $userId)
            ->where('discount_id', $discount->id)
            ->first();

        if ($userUsage) {
            if ($userUsage->uses > 1) {
                $userUsage->decrement('uses'); // Giảm lượt sử dụng đi 1
            } else {
                $userUsage->delete(); // Nếu chỉ có 1 lượt thì xóa luôn
            }
        }
        
        // Xóa discount khỏi session
        session()->forget('discount');

        return back()->with('message', 'Discount removed successfully.');
    }
}
