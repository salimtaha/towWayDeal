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
                        <h3 style="padding-right: 220px"> رسائل التواصل ({{ $contacts->count() }})
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6" >
                    <ol style="padding-left: 220px" class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.welcome') }}">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><a href="{{route('admin.mediators.create')}}">  رسائل التواصل </a></li>
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
                        <div class="col-md-9">
                            <div class="card-header"> رسائل التواصل ({{ $contacts->count() }})</div>
                        </div>

                        <div class="col-md-3" style="margin-top: 20px">
                            <a href="{{ route('admin.contacts.old') }}"  class="btn btn-primary mr-3">
                                التواصل المكتمل <i class="fa fa-list"></i>
                            </a>
                        </div>

                    </div>

                    <div class="card-body">
                        @foreach ($contacts as $contact)

                            <div class="contact-box mb-4" style="background-color: #dee2e6">
                                <div class="contact-header  text-white py-2 px-3">
                                    <h5 class="mb-0">{{ $contact->name }}</h5>
                                </div>
                                <div class="contact-content p-3">
                                    <p><strong>البريد الالكتروني:</strong> {{ $contact->email }}</p>
                                    <p><strong>عنوان الموضوع:</strong> {{ $contact->subject }}</p>
                                    <p><strong>المحتوى:</strong> {{ $contact->message }}</p>
                                </div>
                                <div class="contact-content p-3">
                                    <a href="{{ route('admin.contacts.replay', $contact->id) }}"
                                        class="btn btn-primary btn-sm">الرد عبر البريد</a>
                                </div>
                            </div>
                        @endforeach
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
