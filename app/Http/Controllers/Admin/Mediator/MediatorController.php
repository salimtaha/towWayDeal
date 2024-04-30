<?php

namespace App\Http\Controllers\Admin\Mediator;

use App\Models\Mediator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utils\ImageUpload;
use App\Http\Requests\Mediator\StoreMediatorRequest;
use Illuminate\Support\Facades\File;

class MediatorController extends Controller
{

    public function index()
    {
        $mediators = Mediator::select('*')->paginate(5);
        return view('admin.pages.mediators.index' , compact('mediators'));
    }


    public function create()
    {
        return view('admin.pages.mediators.create');
    }


    public function store(StoreMediatorRequest $request)
    {
        $request->validated();
        $request['password'] = bcrypt($request->password);
        $user = Mediator::create($request->except(['image', 'password_confirmation']));
        if ($request->hasFile('image')) {
            $user->update([
                'image' => ImageUpload::uploadImage($request->image, 'mediators'),
            ]);
        }
        session()->flash('success' , 'تم اضافه مسئول مالي جديد');
        return redirect()->route('admin.mediators.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $mediator = Mediator::findOrFail($id);
        return view('admin.pages.mediators.edit' , compact('mediator'));
    }


    public function update(StoreMediatorRequest $request, $id)
    {
        $request->validated();
        $mediator = Mediator::findOrFail($id);
        $request['password'] = bcrypt($request->password);
        $mediator->update($request->except(['image', 'password_confirmation']));
        if ($request->hasFile('image')) {
            $mediator->update([
                'image' => ImageUpload::uploadImage($request->image, 'mediators' , $mediator->image),
            ]);
        }
        session()->flash('success' , 'تم تحديث بيانات المسئول المالي ');
        return redirect()->route('admin.mediators.index');
    }

    public function destroy($id)
    {
        try {
            $mediator = Mediator::findOrFail($id);
            $mediator->delete();

            session()->flash('success', 'تم حذف المستخدم بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function trashed()
    {
        $mediators = Mediator::onlyTrashed()->paginate(5);
        return view('admin.pages.mediators.trashed' , compact('mediators'));
    }
    public function restore($id)
    {
        try {
            $mediator = Mediator::onlyTrashed()->findOrFail($id);
            $mediator = $mediator->restore();

            session()->flash('success', 'تم استرجاح مسئول السحب بنجاح ');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function forceDelete(Request $request , $id)
    {
        try {
            $mediator = Mediator::onlyTrashed()->findOrFail($id);

            if($mediator->image != 'default.jpg'){
                File::delete(public_path($mediator->image));
            }

            $mediator = $mediator->forceDelete();

            session()->flash('success', 'تم حذف مسئول السحب نهائياً ');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
