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
                            <h3 style="color: rgb(236, 73, 73)"> الموسسات المحذوفه
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
                            <li class="breadcrumb-item active"><a href="{{ route('admin.charities.trashed') }}">المؤسسات المحذوفه  </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    <h2 class="my-4 text-center"> *المؤسسات المحذوفه*</h2>
    <div class="search-container">
      <input type="text" id="searchInput" class="form-control" placeholder="Search">
    </div>
    <table id="categoryTable" class="table table-bordered table-shadow">
      <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>المحافظه</th>
            <th>وثيقه الاعتماد</th>
            <th>العمليات</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($charities as  $charity)
        <tr>
            <td>{{ $charity->id }}</td>
            <td>{{ $charity->name }}</td>
            <td>{{ $charity->governorate->name }}</td>
            <td><img width="80px" class="img-thumbnail  img-fluid" src="{{ asset($charity->health_certificate) }}"></td>
            <td>

                <a href="{{ route('admin.charities.restore' , $charity->id) }}" class="btn btn-primary">استرجاع</a>
                <a href="{{ route('admin.charities.forcedelete', $charity->id) }}" class="btn btn-danger">حذف نهائياً</a>
            </td>
          </tr>
        @empty
           <tr> <td colspan="5"><center><div class="text-info"> لا يوجد مؤسسات في الارشيف</div></center></td></tr>
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
