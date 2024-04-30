@extends('admin.layouts.app')
@section('title' , 'قائمه المحزوفات')

@section('body')


  <div class="container">
    <br><br>
    <h2 class="my-4 text-center"> *الاقسام المحذوفه*</h2>
    <div class="search-container">
      <input type="text" id="searchInput" class="form-control" placeholder="Search">
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
        @foreach ($categoriesTrashed as  $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>@if($category->parent_id == null) قسم رئيسي @else {{ $category->parent->name }} @endif</td>
            <td>

                <a href="{{ route('admin.categories.restore' , $category->id) }}" class="btn btn-primary">استرجاع</a>
                <a href="{{ route('admin.categories.forcedelete', $category->id) }}" class="btn btn-danger">حذف نهائياً</a>
            </td>
          </tr>
        @endforeach


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
