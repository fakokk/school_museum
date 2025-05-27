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

                    <!-- Форма фильтров и поиска -->
                    <div class="row" style="margin-top: 20px;">
                        <form id="filter-form" class="form-inline">
                            <div class="form-group mb-2">
                                <input type="text" name="search" class="form-control" placeholder="Поиск по названию" value="{{ request('search') }}">
                            </div>
                            <div class="form-group mb-2 mx-sm-3">
                                <select name="category" class="form-control">
                                    <option value="">Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2 mx-sm-3">
                                <select name="tag" class="form-control">
                                    <option value="">Выберите тег</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ request('tag') == $tag->id ? 'selected' : '' }}>{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>


                    <div class="container-fluid" style="margin-top: 30px">
                        <div class="row">
                            <a href="{{ route('admin.showpiece.create') }}" style="text-decoration: none; margin-left: 8px;">
                                <div class="card" style="width: 18rem; background-image: url('../../dist/assets/img/stolb.jfif'); background-size: cover; background-position: center; color: white; border: none; display: flex; flex-direction: column;">
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
                                        <h6>Фотографии ({{ $showpiece->photos->count() }}) :</h6>
                                        <div id="carousel-{{ $showpiece->id }}" class="carousel slide" data-ride="carousel" data-interval="false">
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
                                        @if($showpiece->tags->count() > 0)
                                            <div class="post-tags">
                                                @foreach($showpiece->tags as $tag)
                                                    <span class="tag">{{ $tag->title }}</span>
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
    <script>
    document.getElementById('filter-form').addEventListener('change', function() {
        const formData = new FormData(this);
        fetch('{{ route('admin.showpiece.index') }}?' + new URLSearchParams(formData), {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Обновите интерфейс с полученными данными
            const showpiecesContainer = document.getElementById('showpieces-container');
            showpiecesContainer.innerHTML = ''; // Очистите текущий список

            data.showpieces.forEach(showpiece => {
                const card = `
                    <div class="card" style="width: 18rem; margin-left: 20px;">
                        <div class="card-body">
                            <h5 class="card-title">${showpiece.title}</h5>
                        </div>
                        <div class="card-body">
                            <h6>Фотографии (${showpiece.photos.length}) :</h6>
                            <div id="carousel-${showpiece.id}" class="carousel slide" data-ride="carousel" data-interval="false">
                                <div class="carousel-inner">
                                    ${showpiece.photos.map((photo, index) => `
                                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                                            <img src="${photo.url}" class="d-block w-100 img-thumbnail" alt="Фото экспоната" style="height: 150px; width: auto;">
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">${showpiece.category ? showpiece.category.title : 'Без категории'}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">${showpiece.content.substring(0, 150)}...</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Просмотр</a>
                            <a href="#" class="card-link">Редактировать</a>
                        </div>
                    </div>
                `;
                showpiecesContainer.innerHTML += card;
            });
        })
        .catch(error => console.error('Error:', error));
    });
</script>

</div>
@endsection
