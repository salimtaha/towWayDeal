<?php

namespace App\Http\Controllers\Admin\Withdrawal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function index()
    {
        return view('admin.pages.withdrowal.index');
    }
    public function setting()
    {
        return view('admin.pages.withdrowal.setting');
    }
}
