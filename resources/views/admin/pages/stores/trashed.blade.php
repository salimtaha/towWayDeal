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
        <div class="row">
            <div class="col-md-9">
                <div class="search-container">
                    <input type="text" id="searchInput" class="form-control" placeholder=" ابحث هنا">
                </div>
            </div>
            <div class="col-md-3">
                <div class="search-container">
                    <a href="{{ route('admin.stores.index') }}" class="btn btn-info">عرض المتاجر الموثقه   </a>
                </div>
            </div>
        </div>
        <table id="categoryTable" class="table table-bordered product-details">
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

@push('css')
    <style>
        .parent {
            width: 100%;
            text-align: center;
            align-content: center;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* margin-right: 60px; */

        }

        /* body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        } */



        h1 {
            color: #333;
            text-align: center;
        }

        .order-details,
        .product-details {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .order-details h2,
        .product-details h2 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #555;
            font-size: 24px;
            text-align: center;
        }

        .order-details ul {
            list-style: none;
            padding: 0;
        }

        .order-details ul li {
            margin-bottom: 10px;
            color: #666;
        }

        .product-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .product-details th,
        .product-details td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .product-details th {
            background-color: #f0f0f0;
            color: #333;
        }

        .product-details td {
            color: #666;
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
        }

        .buttons .print-button {
            background-color: #4CAF50;
        }

        .buttons .complete-button {
            background-color: #008CBA;
        }

        /* .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */

        h1 {
            color: #333;
            text-align: center;
        }



        .order-details h2 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        .order-details ul {
            list-style: none;
            padding: 0;
        }

        .order-details ul li {
            margin-bottom: 10px;
            color: #666;
            background-color: #e6e6e6;
            padding: 10px;
            border-radius: 4px;
        }

        .order-details ul li strong {
            display: inline-block;
            width: 150px;
            /* Adjust width as needed */
            font-weight: bold;
        }

        /* .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
        }

        .buttons .print-button {
            background-color: #93cf95;
        }

        .buttons .complete-button {
            background-color: #008CBA;
        } */
    </style>
@endpush

