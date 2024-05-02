@extends('admin.layouts.app')

@section('title', 'الصفحه الرئيسيه')
@push('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" /> --}}
@endpush
@section('body')
 <div class="container">
    <div class="row">
        <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="warning-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center">
                                <i data-feather="home" class="font-warning"></i>
                            </div>
                        </div>
                        <div class="media-body media-doller">
                            <span class="m-0">المؤسسات الخيريه</span>
                            <h3 class="mb-0"> <span class="counter">{{ $counts['charities'] }}</span><small>
                                    هذا الشهر
                                </small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="secondary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center">
                                <i data-feather="user" class="font-secondary"></i>
                            </div>
                        </div>
                        <div class="media-body media-doller">
                            <span class="m-0">المستخدمين</span>
                            <h3 class="mb-0"> <span class="counter">{{ $counts['users'] }}</span><small>
                                    هذا الشهر
                                </small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="primary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center">
                                <i data-feather="dollar-sign" class="font-primary"></i>
                                {{-- <i data-feather="message-square" class="font-primary"></i> --}}
                            </div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0"> المبيعات</span>
                            <h3 class="mb-0">$ <span class="counter">{{ $counts['orders'] }}</span><small>

                                    هذا الشهر</small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="danger-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i>
                            </div>
                        </div>
                        <div class="media-body media-doller"><span class="m-0">
                                المتاجر</span>
                            <h3 class="mb-0"> <span class="counter">{{ $counts['vendors'] }}</span><small>
                                    هذا الشهر</small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="d-block w-100">
                <h5 style="font-family: 'Cairo', sans-serif" class="card-title">اخر العمليات علي النظام</h5>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#tab-1" data-target=".etab-p1, .etabi-img1"
                        data-toggle="tab">المستخدمين</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-2" data-target=".etab-p2, .etabi-img2"
                        data-toggle="tab">المتاجر</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-3" data-target=".etab-p3, .etabi-img3"
                        data-toggle="tab">المؤسسات</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-4" data-target=".etab-p4, .etabi-img4"
                        data-toggle="tab">المبيعات</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-5" data-target=".etab-p5, .etabi-img5"
                        data-toggle="tab">التواصل</a></li>
            </ul>
        </div>
    </div>

    <div class="row parent">
        <div style="height: 400px;" class="col-xl-12 mb-30">
            <div class="tab-content">

                <div class="tab-pane fade show active etab-p1">
                    <div class="table-responsive mt-15">
                        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                            <thead>
                                <tr class="table-primary text-primary col-12">
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th>الحاله</th>
                                    <th>المحافظه</th>
                                    <th>المدينه </th>
                                    <th>الصوره</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (\App\Models\User::latest()->take(5)->get() as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td class="badge badge-pill"
                                            style="background:{{ $user->status == 'active' ? 'green' : 'red' }};margin-top: 20px;color:white">
                                            {{ $user->status }}</td>
                                        <td>{{ $user->governorate->name }}</td>
                                        <td>{{ $user->city->name }}</td>
                                        <td><img width="70px" class="img-thumbnail  img-fluid"
                                                src="{{ asset($user->image) }}"></td>
                                        <td>
                                            <div class="btn-group">

                                                <button type="button" class="btn btn-info dropdown-toggle btn-air-light"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    العمليات
                                                </button>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.users.show', $user->id) }}">عرض<i
                                                            class="fa fa-eye"></i></a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.users.delete', $user->id) }}">حذف<i
                                                            class="fa fa-trash"></i></a>

                                                    <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.users.blocked.block', $user->id) }}">بلوك<i
                                                            class="fa fa-stop"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="tab-pane fade etab-p2">
                    <div class="table-responsive mt-15">
                        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                            <thead>
                                <tr class="table-info text-danger col-12">
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th>الحاله </th>
                                    <th>المحافظه</th>
                                    <th>وثيقه الصحه</th>
                                    <th>الوثيقه التجاريه</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (\App\Models\Store::latest()->take(5)->get() as $store)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <a
                                                href="{{ route('admin.stores.show', $store->id) }}">{{ $store->name }}</a>
                                        </td>
                                        <td>{{ $store->email }}</td>
                                        <td class="badge badge-pill"
                                            style="background:{{ $store->status == 'approved' ? 'green' : 'red' }};margin-top: 20px;color:white">
                                            {{ $store->status }}</td>
                                        <td>{{ $store->governorate->name }}</td>
                                        <td><img width="70px" class="img-thumbnail  img-fluid"
                                                src="{{ asset($store->health_approval_certificate) }}"></td>
                                        <td><img width="70px" class="img-thumbnail  img-fluid"
                                                src="{{ asset($store->commercial_resturant_license) }}"></td>
                                        <td>
                                            <div class="btn-group">

                                                <button type="button" class="btn btn-info dropdown-toggle btn-air-light"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    العمليات
                                                </button>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.stores.show', $store->id) }}">عرض<i
                                                            class="fa fa-eye"></i></a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.stores.destroy', $store->id) }}">حذف<i
                                                            class="fa fa-trash"></i></a>

                                                    <div class="dropdown-divider"></div>

                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.stores.block', $store->id) }}">تقييد<i
                                                            class="fa fa-stop"></i></a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade etab-p3">
                    <div class="table-responsive mt-15">
                        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                            <thead>
                                <tr class="table-info text-danger col-12">
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th>الحاله </th>
                                    <th>المحافظه</th>
                                    <th>المدينه</th>
                                    <th>الترخيص</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (\App\Models\Charity::latest()->take(5)->get() as $charity)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> <a
                                                href="{{ route('admin.charities.show', $charity->id) }}">{{ $charity->name }}</a>
                                        </td>
                                        <td>{{ $charity->email }}</td>
                                        <td class="badge badge-pill"
                                            style="background:{{ $charity->status == 'approved' ? 'green' : 'red' }};margin-top: 20px;color:white">
                                            {{ $charity->status }}</td>
                                        <td>{{ $charity->governorate->name }}</td>
                                        <td>{{ $charity->city->name }}</td>
                                        <td><img width="70px" class="img-thumbnail  img-fluid"
                                                src="{{ asset($charity->health_certificate) }}"></td>

                                        <td>
                                            <div class="btn-group">

                                                <button type="button" class="btn btn-info dropdown-toggle btn-air-light"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    العمليات
                                                </button>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.charities.show', $charity->id) }}">عرض<i
                                                            class="fa fa-eye"></i></a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.charities.destroy', $charity->id) }}">حذف<i
                                                            class="fa fa-trash"></i></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.charities.block', $charity->id) }}">تقييد<i
                                                            class="fa fa-stop"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade etab-p4">
                    <div class="table-responsive mt-15">
                        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                            <thead>
                                <tr class="table-info text-danger col-12">
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>المحافظه</th>
                                    <th>المدينه </th>
                                    <th>الحاله</th>
                                    <th>طريقه الدفع</th>
                                    <th>السعر</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (\App\Models\Order::latest()->take(5)->get() as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $order->name }}</td>
                                        <td>{{ $order->governorate->name }}</td>
                                        <td>{{ $order->city->name }}</td>
                                        <td class="badge badge-pill"
                                            style="background:{{ $order->status == 'paid' ? 'green' : 'red' }};margin-top: 20px;color:white">
                                            {{ $order->status == 'paid' ? 'مدفوع' : 'غير مدفوع' }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->total_price }}</td>

                                        <td>
                                            <a href="" class="btn btn-info btn-air-light">
                                                عرض
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('css')
    @push('css')
        <style>
            .parent {
                width: 100%;
                height: 100%;
                box-shadow: 0 0 10px rgba(200, 184, 184, 0.1);


            }
        </style>
    @endpush
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#myTab a').click(function() {
                var href = $(this).attr('href');
                if (href == "[href^='tab-']") {
                    $('.tab-pane').css('display', 'none');
                    $("[class^='etab-'][class^='etabi-']").removeClass('show');
                    $("[class^='etab-'][class^='etabi-']").css('display', 'block');
                    $("[class^='etab-'][class^='etabi-']").addClass('show');
                }
            });
        });
    </script>
@endpush
