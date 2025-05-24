@extends('personal.layouts.main')
@section('content')
<div>
    
        @include('layouts.header')

</div>
<div class="app-wrapper">
    <!-- <nav class="app-header navbar navbar-expand bg-body">
  
    </nav> -->

    @include('personal.layouts.sidebar')

    <main class="app-main">
        <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Учетная запись</h2>
                </div>
                <div class="card-body text-center">
                    <div class="avatar avatar-lg mb-3">
                        <img alt="avatar" src="{{ Auth::user()->user_image ? asset('storage/' . Auth::user()->user_image) : asset('default-avatar.png') }}" class="rounded-circle" style="width: 150px; height: 150px;" />
                    </div>
                    <h3>{{ Auth::user()->username }}</h3>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <div class="mt-4">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <a href="{{ route('personal.edit') }}" class="text">Редактировать профиль</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </main>

    <footer class="app-footer">
    </footer>
</div>
@endsection