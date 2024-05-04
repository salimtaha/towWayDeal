<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.pages.orders.index');
    }

    public function getall()
    {
        $orders = Order::with('user')->select('*');

        return DataTables::of($orders)
            ->addColumn('action', function ($row) {
                return '<a href="'.Route('admin.users.orders.detail' , $row->id).'" class="btn btn-info" style="color:white;" >عرض<i class="fa fa-eye"></i></a>';
            })
            ->addColumn('user_name', function ($row) {
                return $row->user->name;
            })
            ->filterColumn('user_name', function($query, $keyword) {
                $query->whereHas('user', function($q) use($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
