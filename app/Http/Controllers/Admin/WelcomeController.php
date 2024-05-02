<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Charity;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $counts = $this->counts();

        return view('admin.pages.welcome', compact('counts'));
    }

    public function counts()
    {

        $startOfMonth = now()->startOfMonth()->format('Y-m-d h:m:s');
        $endOfMonth = now()->endOfMonth()->format('Y-m-d h:m:s');

        return  [
            'vendors' => Store::where('status', 'approved')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
            'charities' => Charity::where('status', 'approved')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
            'orders' => Order::where('status', 'paid')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
            'users' => User::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count(),
        ];
    }
}
