<?php

namespace App\Http\Controllers\Admin\User\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function detail($id)
    {
        $order = Order::with('orderDetails')->findOrFail($id);
        return view('admin.pages.users.orders.detail' , compact('order'));
    }
}
