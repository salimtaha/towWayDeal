@extends('admin.layouts.app')

@section('body')
    <!-- resources/views/contacts.blade.php -->
    <div class="container mt-5">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3 style="padding-right: 220px"> (تم الرد عليها )رسائل التواصل ({{ $contacts->count() }})
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol style="padding-left: 220px" class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.welcome') }}">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.contacts.index') }}"> رسائل
                                    التواصل </a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.contacts.old') }}"> رسائل
                                    التواصل (تم الرد عليها) </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card-header">التواصل (مكتمل)</div>
                        </div>
                        @if($contacts->count()>0)
                        <div class="col-md-2" style="margin-top: 20px">
                            <button type="button" class="btn btn-danger mr-3" data-bs-toggle="modal"
                            data-original-title="test" data-bs-target="#replay">
                                الكل <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                            <!-- Modal -->
                <div class="modal fade" id="replay" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> حذف المسئول المالي :
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            هل انت متاكد من الحذف ؟
                        </div>
                        <div class="modal-footer">
                            <span style="display: flex">
                                <button type="button" class="btn btn-secondary" style="margin-left: 2px" data-dismiss="modal">اغلاق</button>
                                <a href="{{ route('admin.contacts.old.deleteAll') }}" type="submit" class="btn btn-danger mr-3">حذف الكل</a>

                                </form>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            {{--end delete --}}
                    <div class="card-body" style="background-color: #dee2e6">
                        @forelse ($contacts as $contact)
                            <div class="contact-box mb-4" style="background-color: #b8c5d2">
                                <div class="contact-header text-white py-2 px-3">
                                    <h5 class="mb-0">{{ $contact->name }}</h5>
                                </div>
                                <div class="contact-content p-3">
                                    <p><strong>البريد الالكتروني:</strong> {{ $contact->email }}</p>
                                    <p><strong>عنوان الموضوع:</strong> {{ $contact->subject }}</p>
                                    <p><strong>المحتوى:</strong> {{ $contact->message }}</p>
                                </div>
                                <div class="contact-content p-3">
                                    <a href="{{ route('admin.contacts.old.delete', $contact->id) }}"
                                        class="btn btn-primary btn-sm">حذف </a>
                                </div>
                            </div>
                        @empty
                            <div class="text-info">لا تتوفر سجلات في عمليات التواصل المكتمله</div>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        /* Custom CSS for contact box */
        .contact-box {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .contact-header {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .contact-content {
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }
    </style>
@endpush
