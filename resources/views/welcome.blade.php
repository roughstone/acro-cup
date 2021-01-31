@extends('layouts.app')

@section('content')
<div class="home-page">
    @include('navs.main-nav')
    <div class="content row">
        <div class="h-sm-50 p-2 rounded d-none registration home-component">
            @include('auth.login')
            @include('auth.register')
        </div>
        <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        @include('auth.login')
                        @include('auth.register')
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3 col-10 offset-1 p-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="organization" aria-selected="false">
                        Oorganization
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                        Contacts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">
                        History
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="results-tab" data-toggle="tab" href="#results" role="tab" aria-controls="results" aria-selected="false">
                        Results
                    </a>
                </li>
            </ul>
            <div class="tab-content col-12" id="myTabContent">
                <div class="tab-pane fade show active" id="organization" role="tabpanel" aria-labelledby="organization-tab">
                    @include('welcome.organization')
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    @include('welcome.contacts')
                </div>
                <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                    @include('welcome.history')
                </div>
                <div class="tab-pane fade" id="results" role="tabpanel" aria-labelledby="results-tab">
                    @include('welcome.results')
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 offset-3 my-3">
        <img src="{{strlen($competition->file) > 100 ? $competition->file : 'storage/images/poster.jpg'}}" alt="bgmap" class="img-fluid">
    </div>
    @include('components.footer')
</div>
@endsection
