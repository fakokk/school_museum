<!-- Original file: resources/views/admin/layouts/main.blade.php -->
@extends('admin.layouts.main')
@section('content')
<div class="app-wrapper">

    @include('admin.layouts.sidebar') <!-- Include the sidebar template -->

    <main class="app-main">
    @include('admin.layouts.header') <!-- Include the sidebar template -->
    @include('admin.layouts.menu') <!-- Include the sidebar template -->
    </main>
</div>
@endsection
