@extends('admin.layouts.app')
@section('title', 'الاعدادات')
@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>إعدادت الموقع
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.welcome') }}">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">لوحة التحكم</li>
                            <li class="breadcrumb-item active">إعدادات الموقع</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row product-adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>الاعدادات</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('admin.settings.update', $setting->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    @if ($errors->any())
                                        <div class="shadow rounded bg-red-800 mt-5 mb-5 shadow-lg" id="errorAlert">
                                            <ul style="background-color: rgb(191, 159, 159);color:wheat">
                                                @foreach ($errors->all() as $error)
                                                    <li style="padding-right: 15px;color:white"> * {{ $error }}</li>
                                                    <br>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="validationCustom05" class="col-form-label pt-0">
                                            لوجو الموقع</label>
                                        <input class="image size shadow form-control dropify"
                                            data-default-file="{{ asset($setting->logo) }}" id="validationCustom05"
                                            type="file" name="logo">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">الصورة المصغرة</label>
                                        <input class="image size shadow form-control dropify"
                                            data-default-file="{{ asset($setting->favicon) }}" id="validationCustom05"
                                            type="file" name="favicon">
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                                    اسم الموقع</label>
                                                <input class="size shadow form-control" id="validationCustom01" type="text"
                                                    name="title" value="{{ $setting->title }}">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                                    حقوق النشر </label>
                                                <input class="size shadow form-control" id="validationCustom02" type="text"
                                                    name="copyright" value="{{ $setting->copyright }}">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">وصف الموقع</label>
                                        <textarea class="textarea shadow area" rows="5" cols="12" name="description">{{ $setting->description }}</textarea>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                                    بريد الدعم المالي </label>
                                                <input class="size shadow form-control" id="validationCustom01" type="text"
                                                    name="withdrawal_email" value="{{ $setting->withdrawal_email }}">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                                    بريد المشاكل الفنيه </label>
                                                <input class="size shadow form-control" id="validationCustom02" type="text"
                                                    name="support_email" value="{{ $setting->support_email }}">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="validationCustom02" class="col-form-label"><span>*</span>
                                                    بريد الاستفسارات </label>
                                                <input class="size shadow form-control" id="validationCustom02" type="text"
                                                    name="info_email" value="{{ $setting->info_email }}">

                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustomtitle" class="col-form-label pt-0"> رقم الهاتف
                                                    الاول</label>
                                                <input class="size shadow form-control" id="validationCustomtitle"
                                                    type="text" name="phone[]" value="{{ $setting->phone[0] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustomtitle" class="col-form-label pt-0">رقم الهاتف
                                                    الثاني</label>
                                                <input class="size shadow form-control" id="validationCustomtitle"
                                                    type="text" name="phone[]" value="{{ $setting->phone[1] }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustomtitle" class="col-form-label pt-0">رابط الفيس
                                                    بوك</label>
                                                <input class="size shadow form-control" id="validationCustomtitle"
                                                    type="text" name="facebook" value="{{ $setting->facebook }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustomtitle" class="col-form-label pt-0">رابط
                                                    تويتر</label>
                                                <input class="size shadow form-control" id="validationCustomtitle"
                                                    type="text" name="twitter" value="{{ $setting->twitter }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustomtitle" class="col-form-label pt-0">حساب
                                                    الانستجرام</label>
                                                <input class="size shadow form-control" id="validationCustomtitle"
                                                    type="text" name="instagram" value="{{ $setting->instagram }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustomtitle" class="col-form-label pt-0">
                                                    اليوتيوب</label>
                                                <input class="size shadow form-control" id="validationCustomtitle"
                                                    type="text" name="youtupe" value="{{ $setting->youtupe }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustomtitle" class="col-form-label pt-0">رابط الفيس
                                                    بوك</label>
                                                <input class="size shadow form-control" id="validationCustomtitle"
                                                    type="text" name="facebook" value="{{ $setting->facebook }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="validationCustomtitle" class="col-form-label pt-0">التيك
                                                    توك</label>
                                                <input class="size shadow form-control" id="validationCustomtitle"
                                                    type="text" name="tiktok" value="{{ $setting->tiktok }}">
                                            </div>
                                        </div>
                                    </div>







                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">حفظ</button>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

@push('css')
    <style>
        .shadow {
            box-shadow: 0 1px 1px rgba(74, 237, 199, 0.1);

        }
        .size{
            background: rgb(220, 208, 208);
            height: 50px;
        }
        .textarea{
            background: rgb(220, 208, 208);
            height: 60px;
        }

    </style>
@endpush
