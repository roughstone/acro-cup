@extends('layouts.app')

@section('content')
<div class="container-fluid px-0" data-participationtax="{{ $participationtax ?? ''}}" >
    @include('navs.registration-nav')
    <div class="container-fluid content">

    </div>
</div>
@endsection
