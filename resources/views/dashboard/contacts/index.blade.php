@extends('dashboard.layouts.master')

@section('title', __('messages.Contacts Management'))

@section('content')

<div class="page-container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('messages.Contacts Management') }}</h4>
            </div>
        </div>
    </div>

    @include('dashboard.contacts.components._update')
</div>

@endsection