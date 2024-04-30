<?php

namespace App\Http\Controllers\Admin\Charity;

use App\Models\Charity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class CharityController extends Controller
{

    public function index()
    {

        return view('admin.pages.charities.index');
    }

    public function getallApproved()
    {
        $users = Charity::with(['governorate', 'city'])->where('status', 'approved')->select('*');

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   العمليات
                </button>
                <div class="dropdown-menu ">
                <a id="deleteBtn" data-id="' . $row->id . '"class="dropdown-item"   data-bs-toggle="modal"
                data-original-title="test" data-bs-target="#deletemodal">  الحذف  <i class="fa fa-trash"></i></a>
                  <a class="dropdown-item "  href="' . Route('admin.charities.show', $row->id) . '">العرض   <i class="fa fa-eye"></i></a>

              </div>';
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . asset('default.jpg') . '" width="50px">';
            })
            ->addColumn('governorate', function ($row) {
                return $row->governorate->name;
            })
            ->addColumn('city', function ($row) {
                return $row->city->name;
            })
            ->addColumn('health_certificate' , function($row){
                return '<img src="'.asset($row->health_certificate).'" width="50px">';
            })

            ->rawColumns(['health_certificate', 'action', 'governorate', 'city'])
            ->Make(true);

    }
    public function wating()
    {
        $charities = Charity::where('status' , 'pending')->get();
        return view('admin.pages.charities.wating' , compact('charities'));
    }

    public function getallPending()
    {

        $users = Charity::with(['governorate', 'city'])->where('status', 'pending')->select('*');

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   العمليات
                </button>
                <div class="dropdown-menu ">
                <a id="deleteBtn" data-id="' . $row->id . '"class="dropdown-item"   data-bs-toggle="modal"
                data-original-title="test" data-bs-target="#deletemodal">  الحذف  <i class="fa fa-trash"></i></a>
                  <a class="dropdown-item "  href="' . Route('admin.charities.show', $row->id) . '">العرض   <i class="fa fa-eye"></i></a>

              </div>';
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . asset('default.jpg') . '" width="50px">';
            })
            ->addColumn('governorate', function ($row) {
                return $row->governorate->name;
            })
            ->addColumn('city', function ($row) {
                return $row->city->name;
            })
            ->addColumn('health_certificate' , function($row){
                return '<img src="'.asset($row->health_certificate).'" width="50px">';
            })

            ->rawColumns(['health_certificate', 'action', 'governorate', 'city'])
            ->Make(true);
    } // End of getall

    public function trashed()
    {
        $charities = Charity::onlyTrashed()->get();
        return view('admin.pages.charities.trashed' , compact('charities'));
    }
    public function restore($id)
    {
        try {
            $charity = Charity::onlyTrashed()->findOrFail($id);
            $charity = $charity->restore();

            session()->flash('success', 'تم استرجاح المؤسسه بنجاح ');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function forceDelete(Request $request , $id)
    {
        try {
            $charity = Charity::onlyTrashed()->findOrFail($id);

            if($charity->health_certificate != 'default.jpg'){
                File::delete(public_path($charity->health_certificate));
            }
            if($charity->image != 'default.jpg'){
                File::delete(public_path($charity->image));
            }

            $charity = $charity->forceDelete();

            session()->flash('success', 'تم حذف المؤسسة نهائياً ');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $charity = Charity::findOrFail($id);
        return view('admin.pages.charities.show' , compact('charity'));
    }
    public function accept($id)
    {
        $charity = Charity::findOrFail($id);
        $charity->update(['status' => 'approved']);
        session()->flash('success' , 'تم قبول المؤسسه  بعد رؤيه بيانات الاعتماد بنجاح ');
        return redirect()->back();
    }
    public function block($id)
    {
        $charity = Charity::findOrFail($id);
        $charity->update(['status' => 'blocked']);
        session()->flash('success' , 'تم حظر المؤسسه بنجاح ');
        return redirect()->back();
    }
    public function active($id)
    {
        $charity = Charity::findOrFail($id);
        $charity->update(['status' => 'approved']);
        session()->flash('success' , 'تم فك حظر المؤسسه بنجاح ');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        try{

            $charity = Charity::findOrFail($request->id);
            $charity->delete();

            session()->flash('success' , 'تم حذف المؤسسه من قائمه الانتظار بنجاح');
            return redirect()->route('admin.charities.wating');

        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
}
