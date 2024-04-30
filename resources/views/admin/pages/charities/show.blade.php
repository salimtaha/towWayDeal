@extends('admin.layouts.app')

@section('title', 'عرض المؤسسه')
@section('body')
    <div class="container mt-4">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3 style="color: rgb(236, 73, 73)"> الموسسات الخيريه
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.charities.index') }}">المؤسسات الخيريه</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.charities.wating') }}">قائمه الانتظار </a>
                            </li>
                            <li class="breadcrumb-item active"><a href="">عرض : {{ $charity->name }} </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- User Profile Box -->
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
                        <p class="card-text text-muted mb-2">البريد الالكتروني : {{ $charity->email }}</p>
                        <p class="card-text text-muted mb-2">المحافظه : {{ $charity->governorate->name }}</p>
                        <p class="card-text text-muted mb-2">المدينه : {{ $charity->city->name }}</p>
                        <p class="card-text text-muted mb-2">رقم الجوال : {{ $charity->phone }}</p>
                        <!-- User Status (Displayed as background color red or green) -->
                        <p class="card-text mb-3">الحاله: <span
                                class="badge badge-pill {{ $charity->status == 'approved' ? 'badge-success' : 'badge-danger' }}">{{ $charity->status }}</span>
                        </p>
                        <!-- Action Buttons -->


                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                العمليات
                            </button>
                            <div class="dropdown-menu ">
                                <a id="deleteBtn" class="dropdown-item" data-bs-toggle="modal" data-original-title="test"
                                    data-bs-target="#deletemodal"> الحذف <i class="fa fa-trash"></i></a>
                                <div class="dropdown-divider"></div>
                                @if ($charity->status == 'pending')
                                    <a class="dropdown-item btn-secondry "
                                        href="{{ route('admin.charities.accept', $charity->id) }}">قبول المؤسسه <i
                                            class="fa fa-star"></i></a>
                                @elseif($charity->status == 'blocked')
                                    <a class="dropdown-item btn-info "
                                        href="{{ route('admin.charities.active', $charity->id) }}">فك تقيد الحساب <i
                                            class="fa fa-red"></i></a>
                                @elseif ($charity->status == 'approved')
                                    <a class="dropdown-item btn-danger "
                                        href="{{ route('admin.charities.block', $charity->id) }}"> تقييد الحساب <i
                                            class="fa fa-stop"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- delete --}}
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.charities.destroy') }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <p>متأكد من الحذف .. ؟؟</p>
                                @csrf
                                <input type="hidden" name="id" value="{{ $charity->id }}">
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

        <!-- User Orders Table -->
        <div class="card mt-4 shadow rtl">
            <div class="card-body" style="background: rgb(248, 244, 244)">
                <center>
                    <h5 class="card-title rtl">*وثائق المؤسسه *</h5>
                </center><br>
                <table class="table">
                    <thead>
                        <tr>

                            <th>الوثيقه</th>
                            <th>
                                <div class="btn-group" style="margin-right: 680px">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                        العمليات
                                    </button>
                                    <div class="dropdown-menu ">

                                        <a class="dropdown-item btn-sm" href="{{ asset($charity->health_certificate) }}"
                                            download="image">
                                            <button class="btn btn-air-info"> تحميل الصوره</button>
                                        </a>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <center>
                                <td><img src="{{ asset($charity->health_certificate) }}"class="img-thumbnail img-fluid">
                                </td>
                            </center>

                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

        <!-- Product Overviews Table -->
        <div class="card mt-4 shadow">
            <div class="card-body" style="background: rgb(244, 243, 254)">
                <center>
                    <h5 class="card-title rtl">*عن المؤسسه *</h5>
                </center><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>الوصف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>{{ $charity->description }}</td>
                    </tbody>
                </table>
            </div>
        </div>
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
