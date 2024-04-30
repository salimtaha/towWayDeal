@extends('admin.layouts.app')

<!-- resources/views/reply.blade.php -->

@section('body')

<div class="container mt-5">
         <!-- Container-fluid starts-->
         <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3 style="padding-right: 220px"> الرد علي رسائل التواصل
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
                            <li class="breadcrumb-item "><a href="{{ route('admin.contacts.index') }}">    رسائل التواصل </a></li>
                            <li class="breadcrumb-item active"><a href="">  الرد علي رسائل التواصل </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> الرد علي التواصل : {{ $contact->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.contacts.send') }}">
                        @csrf

                        <div class="form-group">
                            <label for="message">الرساله</label>
                            <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input type="hidden" name="id" value="{{ $contact->id }}">
                            <input type="hidden" name="email" value="{{ $contact->email }}">
                            <input type="hidden" name="name" value="{{ $contact->name }}">
                            <input type="hidden" name="subject" value="{{ $contact->subject }}">
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">ارسال الرد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
