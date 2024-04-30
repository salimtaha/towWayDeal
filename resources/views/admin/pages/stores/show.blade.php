@extends('admin.layouts.app')

@section('title', 'عرض المتجر')
@section('body')
    <div class="container mt-4">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3 style="color: rgb(236, 73, 73)"> عرض : {{ $store->name }}
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.stores.index') }}">المتاجر </a>
                            </li>
                            <li class="breadcrumb-item active"><a href=""> : {{ $store->name }} </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->


        <!--  Store data table -->
        <div class="card mt-4 shadow">
            <div class="card-body" style="background: rgb(244, 243, 254)">
                <center>
                    <h5 class="card-title rtl">*بيانات المتجر*</h5>
                </center><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>الاسم : </th>
                            <th></th>
                            <td>{{ $store->name }}</td>
                            <th><i class="fa fa-user"></i></th>

                        </tr>
                        <tr>
                            <th> البريد الالكتروني : </th>
                            <th></th>
                            <td>{{ $store->email }}</td>
                            <th><i class="fa fa-envelope-open" aria-hidden="true"></i></th>

                        </tr>
                        <tr>
                            <th>رقم الجوال : </th>
                            <th></th>
                            <td>{{ $store->phone }}</td>
                            <th><i class="fa fa-phone"></i></th>
                        </tr>
                        <tr>
                            <th>رصيد الحساب : </th>
                            <th></th>
                            <td>{{ $store->account->value }}</td>
                            <td><i class="fa fa-money" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th>التقييم : </th>
                            <th></th>
                            <td>
                                <i class="fa @if($store->rate>=1)fa-star @else fa-star-o @endif" aria-hidden="true"></i>
                                <i class="fa @if($store->rate>=2)fa-star @else fa-star-o @endif" aria-hidden="true"></i>
                                <i class="fa @if($store->rate>=3)fa-star @else fa-star-o @endif" aria-hidden="true"></i>
                                <i class="fa @if($store->rate>=4)fa-star @else fa-star-o @endif" aria-hidden="true"></i>
                                <i class="fa @if($store->rate>=5)fa-star @else fa-star-o @endif" aria-hidden="true"></i>




                            </td>
                            <th><i class="fa fa-user"></i></th>
                        </tr>
                        <tr>
                            <th>العنوان : </th>
                            <th></th>
                            <td>{{ $store->street }}</td>
                            <th><i class="fa fa-home" aria-hidden="true"></i></th>
                        </tr>
                        <tr>
                            <th>المحافظه : </th>
                            <th></th>
                            <td>{{ $store->governorate->name }}</td>
                            <th><i class="fa fa-map-marker"></i></th>

                        </tr>
                        <tr>
                            <th>المدينه : </th>
                            <th></th>
                            <td>{{ $store->city->name }}</td>
                            <th><i class="fa fa-map-marker"></i></th>

                        </tr>
                        <tr>
                            <th>الحاله : </th>
                            <th></th>
                            <td><strong class="badge badge-pill"
                                    style="background-color:@if ($store->status == 'pending') red @elseif($store->status == 'approved')blue @else red @endif">{{ $store->status }}</strong>
                            </td>
                            <th><i class="fa fa-info-circle"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>العمليات :</strong></td>
                            <td></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                        العمليات
                                    </button>
                                    <div class="dropdown-menu ">
                                        <a id="deleteBtn" class="dropdown-item" data-bs-toggle="modal"
                                            data-original-title="test" data-bs-target="#deletemodal"> الحذف <i
                                                class="fa fa-trash"></i></a>
                                        <div class="dropdown-divider"></div>
                                        @if ($store->status == 'pending')
                                            <a class="dropdown-item btn-secondry "
                                                href="{{ route('admin.stores.accept', $store->id) }}">قبول المؤسسه <i
                                                    class="fa fa-star"></i></a>
                                        @elseif($store->status == 'blocked')
                                            <a class="dropdown-item btn-info "
                                                href="{{ route('admin.stores.active', $store->id) }}">فك تقيد الحساب <i
                                                    class="fa fa-red"></i></a>
                                        @elseif ($store->status == 'approved')
                                            <a class="dropdown-item btn-danger "
                                                href="{{ route('admin.stores.block', $store->id) }}"> تقييد الحساب <i
                                                    class="fa fa-stop"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </td>


                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <!-- User Orders Table -->
        <div class="card mt-4 shadow rtl">
            <div class="card-body" style="background: rgb(248, 244, 244)">
                <center>
                    <h5 class="card-title rtl">*مرفقات المتجر*</h5>
                </center><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>صوره المتجر</th>
                            <th>وثيقة الترخيص </th>
                            <th>وثيقه الصحه</th>
                        </tr>
                        <tr>
                            <th> <a href="{{ asset($store->image) }}" download="image" class="btn btn-air-info ">تحميل
                                    الصوره </a></th>
                            <th> <a href="{{ asset($store->commercial_resturant_license) }}" download="image"
                                    class="btn btn-air-info ">تحميل الصوره </a></th>
                            <th> <a href="{{ asset($store->health_approval_certificate) }}" download="image"
                                    class="btn btn-air-info ">تحميل الصوره </a></th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- <tr>
                            <div class="btn-group" style="margin-right: 680px">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    العمليات
                                </button>
                                <div class="dropdown-menu ">

                                    <a class="dropdown-item " href="{{ asset($store->health_certificate) }}"
                                        download="image">
                                        <button class="btn btn-air-info"> تحميل الصوره</button>
                                    </a>
                                </div>
                            </div>
                        </tr> --}}

                        <tr>

                            <td><img width="300px" src="{{ asset($store->image) }}"class="img-thumbnail img-fluid"></td>
                            <td><img width="300px"
                                    src="{{ asset($store->commercial_resturant_license) }}"class="img-thumbnail img-fluid">
                            </td>
                            <td><img width="300px"
                                    src="{{ asset($store->health_approval_certificate) }}"class="img-thumbnail img-fluid">
                            </td>


                        </tr>


                    </tbody>
                </table>
            </div>
        </div>


        {{-- <!-- store operations  Box -->
        <div class="card shadow" style="background: rgb(236, 234, 248)">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <!-- User Image (Displayed with border) -->
                        <div class="text-center border rounded p-3">
                            <img src="{{ asset('default.jpg') }}" class="img-thumbnail img-fluid" alt="User Image">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- User Details -->
                        <h5 class="card-title mb-0"> بيانات المؤسسه</h5><br>
                        <p class="card-text text-muted mb-2">البريد الالكتروني : {{ $store->email }}</p>
                        <p class="card-text text-muted mb-2">المحافظه : {{ $store->governorate->name }}</p>
                        <p class="card-text text-muted mb-2">المدينه : {{ $store->city->name }}</p>
                        <p class="card-text text-muted mb-2">رقم الجوال : {{ $store->phone }}</p>
                        <!-- User Status (Displayed as background color red or green) -->
                        <p class="card-text mb-3">الحاله: <span
                                class="badge badge-pill {{ $store->status == 'approved' ? 'badge-success' : 'badge-danger' }}">{{ $store->status }}</span>
                        </p>
                        <!-- Action Buttons -->



                    </div>
                </div>
            </div>
        </div> --}}


        {{-- delete --}}
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.stores.destroy') }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <p>متأكد من حذف :{{ $store->name }} ؟؟</p>
                                @csrf
                                <input type="hidden" name="id" value="{{ $store->id }}">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-danger">حذف </button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- delete --}}

    </div>

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
@endpush
