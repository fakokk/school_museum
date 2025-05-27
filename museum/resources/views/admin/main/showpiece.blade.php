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
                    <div class="container-fluid">
                        <div class="row" >

                        @foreach($showpieces as $showpiece)
                            <div class="card" style="width: 18rem; margin-left: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$showpiece->title}}</h5>
                                    <p class="card-text">{{$showpiece->category ? $showpiece->category->title : 'Без категории'}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{!!$showpiece->content!!}</li>
                                    @if($showpiece->tags->count() > 0)
                                    <div class="post-tags">
                                        @foreach($showpiece->tags as $tag)
                                            <span class="tag">{{ $tag->title }}</span> <!-- Tag Name -->
                                        @endforeach
                                    </div>
                                    @endif
                                </ul>
                                <div class="card-body">
                                    <h6>Фотографии:</h6>
                                    <div class="image-gallery">
                                        @foreach($showpiece->photos as $photo)
                                            <img src="{{ Storage::url($photo->url) }}" class="img-thumbnail" alt="Фото экспоната" style="height: 150px; width: auto; margin: 5px;">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="card-link">Просмотр</a>
                                    <a href="#" class="card-link">Редктировать</a>
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
