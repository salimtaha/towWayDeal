@extends('admin.layouts.app')

@section('title', 'عرض المستخدم')
@section('body')
    <div class="container mt-4">
        <!-- User Profile Box -->
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <!-- User Image (Displayed with border) -->
                        <div class="text-center border rounded p-3">
                            <img src="{{ asset('default.jpg') }}" class="img-fluid" alt="User Image">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- User Details -->
                        <h5 class="card-title mb-0"> بيانات المستخدم</h5><br>
                        <p class="card-text text-muted mb-2">البريد الالكتروني: {{ $user->email }}</p>
                        <p class="card-text text-muted mb-2">المحافظه: {{ $user->governorate->name }}</p>
                        <p class="card-text text-muted mb-2">المدينه: {{ $user->city->name }}</p>
                        <!-- User Status (Displayed as background color red or green) -->
                        <p class="card-text mb-3">الحاله: <span
                                class="badge badge-pill {{ $user->status == 'active' ? 'badge-success' : 'badge-danger' }}">{{ $user->status }}</span>
                        </p>
                        <!-- Action Buttons -->


                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                العمليات
                            </button>
                            <div class="dropdown-menu ">
                                <a id="deleteBtn" data-id="' . $row->id . '"class="dropdown-item" data-bs-toggle="modal"
                                    data-original-title="test" data-bs-target="#deletemodal"> الحذف <i
                                        class="fa fa-trash"></i></a>
                                <div class="dropdown-divider"></div>
                                @if ($user->status == 'active')
                                    <a class="dropdown-item btn-primary "
                                        href="{{ route('admin.users.blocked.block', $user->id) }}">تقيد الحساب <i
                                            class="fa fa-stop"></i></a>
                                @else
                                    <a class="dropdown-item btn-info "
                                        href="{{ route('admin.users.blocked.retrieve', $user->id) }}">فك تقيد الحساب <i
                                            class="fa fa-star"></i></a>
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
                <form action="{{ route('admin.users.delete') }}" method="POST">
                    <div class="modal-content">
                        <div class="modal-body">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <p>متأكد من الحذف .. ؟؟</p>
                                @csrf
                                <input type="hidden" name="id" id="id">
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
            <div class="card-body">
                <center>
                    <h5 class="card-title rtl">*طلبات المستخدم*</h5>
                </center><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>رقم الاوردر</th>
                            <th>تاريخ الاوردر</th>
                            <th>السعر الكلي</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            العمليات
                                        </button>
                                        <div class="dropdown-menu ">
                                                <a class="dropdown-item btn-sm"
                                                    href="{{ route('admin.users.orders.detail', $user->id) }}">  تفاصيل الطلب <i
                                                        class="fa fa-list"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Product Overviews Table -->
        <div class="card mt-4 shadow">
            <div class="card-body">
                <h5 class="card-title mb-4">Product Overviews</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Product overview data will be dynamically populated here -->
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
