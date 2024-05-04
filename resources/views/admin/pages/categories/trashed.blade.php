@extends('admin.layouts.app')
@section('title' , 'قائمه المحزوفات')

@section('body')


  <div class="container">

       <!-- Container-fluid starts-->
       <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>   الاقسام الفرعيه
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
                        <li class="breadcrumb-item "><a href="{{ route('admin.categories.index') }}">
                            الاقسام </a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.categories.trashed') }}">
                                الاقسام المحذوفه</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <h2 class="my-4 text-center"  style="font-size: 25px;font-family:'Courier New', Courier, monospace"> *الاقسام المحذوفه*</h2>
    <div class="row .product-details">
        <div class="col-md-9 ">
            <div class="search-container">
                <input type="text" id="searchInput" class="form-control" placeholder=" ابحث هنا">
            </div>
        </div>
        <div class="col-md-3">
            <div class="search-container">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-info">عرض الاقسام النشطه    </a>
            </div>
        </div>
    </div>
    <table id="categoryTable" class="table table-bordered table-shadow">
      <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>القسم</th>
          <th>العمليات</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categoriesTrashed as  $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>@if($category->parent_id == null) قسم رئيسي @else {{ $category->parent->name }} @endif</td>
            <td>

                <a href="{{ route('admin.categories.restore' , $category->id) }}" class="btn btn-primary">استرجاع</a>
                <a href="{{ route('admin.categories.forcedelete', $category->id) }}" class="btn btn-danger">حذف نهائياً</a>
            </td>
          </tr>
        @empty
            <td colspan="4">
                <div class="text-info"><center>لا يوجد بيانات</center>  </div>
            </td>
        @endforelse


        <!-- Add more rows here with fake data -->
      </tbody>
    </table>
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



    </style>
@endpush
