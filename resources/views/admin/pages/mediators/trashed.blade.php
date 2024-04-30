@extends('admin.layouts.app')
@section('title', ' مسئولين السحب')

@section('body')


    <div class="container">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3> أرشيف مسئولين السحب المالي
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
                            <li class="breadcrumb-item "><a href="{{ route('admin.mediators.index') }}"> المسئولين
                                    الماليين</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.mediators.trashed') }}"> أرشيف
                                    المسئولين
                                    الماليين</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
        <h2 class="my-4 text-center"> * ارشيف مسئولين السحب *</h2>
        <div class="row">
            <div class="col-md-9">
                <div class="search-container">
                    <input type="text" id="searchInput" class="form-control" placeholder=" ابحث هنا">
                </div>
            </div>
            <div class="col-md-3">
                <div class="search-container">
                    <a href="{{ route('admin.mediators.create') }}" class="btn btn-info">اضافه مسئول سحب جديد</a>
                </div>
            </div>
        </div>

        <table id="categoryTable" class="table table-bordered table-shadow">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الالكتروني</th>
                    <th>المعرف</th>
                    <th>الصوره</th>

                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mediators as  $mediator)
                    <tr>
                        <td>{{ $mediator->id }}</td>
                        <td>{{ $mediator->name }}</td>
                        <td>{{ $mediator->email }}</td>
                        <td>{{ $mediator->user_name }}</td>
                        <td><img class="img-thumbnail" src="{{ asset($mediator->image) }}" alt="" width="60px">
                        </td>
                        <td>
                            <span style="display: flex">
                                <a href="{{ route('admin.mediators.restore', $mediator->id) }}"
                                    class="btn btn-info">استرجاع</a>
                                <!-- Button trigger modal -->

                                <button type="button" class="btn btn-primary mr-3" data-toggle="modal"
                                    data-target="#exampleModal{{ $mediator->id }}">
                                    الحذف نهائياً<i class="fa fa-trash"></i>
                                </button>
                            </span>

                        </td>
                    </tr>

                    {{-- delete --}}
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $mediator->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> حذف المسئول المالي :
                                        {{ $mediator->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    هل انت متاكد من الحذف ؟
                                </div>
                                <div class="modal-footer">
                                    <span style="display: flex">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                        <form action="{{ route('admin.mediators.forceDelete', $mediator->id) }}"
                                            method="post">

                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-primary mr-3">حذف نهائيا</button>

                                        </form>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- delete --}}

                @empty
                    <div class="text-info">لا يوجد مسئولين سحب في الارشيف</div>
                @endforelse



                <!-- Add more rows here with fake data -->
            </tbody>

        </table>
        {{ $mediators->links() }}


    </div>


@endsection
@push('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-shadow {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .search-container {
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            .search-container {
                display: flex;
                flex-direction: column;
            }

            .search-container input {
                margin-bottom: 10px;
            }
        }
    </style>
@endpush
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Search functionality
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#categoryTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
@endpush
