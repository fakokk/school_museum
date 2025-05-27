@extends('admin.layouts.main')
@section('content')
<div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
        <!-- Header content here -->
    </nav>
    <!--end::Header-->

    @include('admin.layouts.sidebar') <!-- Include the sidebar template -->

    <!--begin::App Main-->
    <main class="app-main">
        @include('admin.layouts.header') <!-- Include the sidebar template -->

        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <!-- Main content here -->

                    <div style="margin-top: 30px">
                        <h1>Экспонаты виртуального музея</h1>
                    </div>
                    <div class="container-fluid" style="margin-top: 30px">
                        <div class="row">

                            <a href="{{ route('admin.showpiece.create') }}" style="text-decoration: none; margin-left: 8px;">
                                <div class="card" style="width: 18rem;  background-image: url('../../dist/assets/img/stolb.jfif'); background-size: cover; background-position: center; color: white; border: none; display: flex; flex-direction: column;">
                                    <div class="card-body text-center" style="padding: 20px; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px; flex-grow: 1; display: flex; flex-direction: column; justify-content: center;">
                                        <h3 style="font-size: 50px;">+</h3>
                                        <h5 class="card-title" style="margin-top: 10px;">Новый экспонат</h5>
                                    </div>
                                </div>
                            </a>

                        @foreach($showpieces as $showpiece)
                            <div class="card" style="width: 18rem; margin-left: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$showpiece->title}}</h5>
                                </div>

                                 <div class="card-body">
                                    <h6>Фотографии ({{ $showpiece->photos->count() }}) :</h6> <!-- Выводим количество фотографий -->

                                    <div id="carousel-{{ $showpiece->id }}" class="carousel slide" data-ride="carousel" data-interval="false"> <!-- Устанавливаем data-interval в false -->
                                        <div class="carousel-inner">
                                            @foreach($showpiece->photos as $index => $photo)
                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                    <img src="{{ Storage::url($photo->url) }}" class="d-block w-100 img-thumbnail" alt="Фото экспоната" style="height: 150px; width: auto;">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-{{ $showpiece->id }}" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-{{ $showpiece->id }}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <p class="card-text">{{$showpiece->category ? $showpiece->category->title : 'Без категории'}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ Str::limit(strip_tags($showpiece->content), 150, '...') }}</li>
                                     <!-- Ограничиваем количество символов и убираем HTML-теги -->
                        
                                    @if($showpiece->tags->count() > 0)
                                    <div class="post-tags">
                                        @foreach($showpiece->tags as $tag)
                                            <span class="tag">{{ $tag->title }}</span> <!-- Tag Name -->
                                        @endforeach
                                    </div>
                                    @endif
                                </ul>

                               

                                <div class="card-body">
                                    <a href="#" class="card-link">Просмотр</a>
                                    <a href="#" class="card-link">Редактировать</a>
                                    <a href="{{ route('admin.showpiece.edit', $showpiece->id) }}">
                                        <img src="../../dist/assets/img/icons/pencil-solid.svg" width="20" height="20" style="margin-left: 35px;"/>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--end::App Main-->

    <!--begin::Footer-->
    <footer class="app-footer">
        <!-- Footer content here -->
    </footer>
    <!--end::Footer-->
</div>
@endsection
