<?php

namespace App\Http\Controllers\Admin\Withdrawal;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $withdrawals = Withdrawal::when($request->search , function($query) use ($request){
            $query->whereRelation('store' , 'name' , 'LIKE' , '%'. $request->search.'%');
            $query->orWhereRelation('method' , 'name' , 'LIKE' , '%'. $request->search.'%');

        })->paginate(6);

        return view('admin.pages.withdrowal.index' , compact('withdrawals'));

    }

    public function setting()
    {
        return view('admin.pages.withdrowal.setting');
    }

    public function show($id)
    {
        $store_id = Withdrawal::where('id' , $id)->pluck('store_id');
        $store = Store::findOrFail($id);

        $all_withdrawal = Withdrawal::with(['store' ,'mediator' , 'method'])
            ->where('store_id' , $store_id[0])
            ->orderByDesc('id')
            ->paginate(5);

        return view('admin.pages.withdrowal.show' , compact('all_withdrawal' , 'store'));

    }
}
