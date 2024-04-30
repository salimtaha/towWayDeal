@extends('admin.layouts.app')
@section('title', 'قائمه المحزوفات')

@section('body')


    <div class="container">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3 style="color: rgb(236, 73, 73)"> المتاجر المحذوفه
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
                            <li class="breadcrumb-item active"><a href="{{ route('admin.stores.trashed') }}">المتاجر
                                    المحذوفه </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
        <h2 class="my-4 text-center"> *المتاجر المحذوفه*</h2>
        <div class="search-container">
            <input type="text" id="searchInput" class="form-control" placeholder=" ابحث عن متجر معين">
        </div>
        <table id="categoryTable" class="table table-bordered table-shadow">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>أسم المؤسسه</th>
                    <th>المحافظه</th>
                    <th>المدينه</th>
                    <th>الصوره </th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stores as  $store)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->governorate->name }}</td>
                        <td>{{ $store->city->name }}</td>
                        <td><img src="{{ asset($store->image) }}" class="img-thumbnail  img-fluid" width="100px"></td>
                        <td>

                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                   العمليات
                                </button>
                                <div class="dropdown-menu ">
                                <a id="deleteBtn" data-id="' . $row->id . '"class="dropdown-item"   data-bs-toggle="modal"
                                data-original-title="test" data-bs-target="#deletemodal{{ $store->id }}">  الحذف  <i class="fa fa-trash"></i></a>
                                <a class="dropdown-item "  href="{{Route('admin.stores.restore', $store->id)}}">استرجاع  <i class="fa fa-undo" aria-hidden="true"></i></a>
                                <a class="dropdown-item "  href="{{ Route('admin.stores.show', $store->id) }}">العرض   <i class="fa fa-eye"></i></a>

                              </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="deletemodal{{ $store->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">هل انت  متاكد من حذف متجر : {{ $store->name }} ؟</h5>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">الغاء</button>
                                    <a href="{{ route('admin.stores.forcedelete' , $store->id) }}"  class="btn btn-primary">حذف</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <tr>
                        <td colspan="6">
                            <center>
                                <div class="text-info"> لا يوجد متاجر في الارشيف</div>
                            </center>
                        </td>
                    </tr>
                @endforelse


                <!-- Add more rows here with fake data -->
            </tbody>
        </table>
        {{ $stores->links() }}
    </div>


@endsection
@push('css')
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
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
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
@endpush
