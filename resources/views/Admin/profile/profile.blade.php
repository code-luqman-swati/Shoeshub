@extends('layouts.app')

@section('content')
    <x-common.page-breadcrumb pageTitle="" />
    <div >
        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90 lg:mb-7">Profile</h3>
        
        <x-admin.personal-info-card />
       
    </div>
@endsection
