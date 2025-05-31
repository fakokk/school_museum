@extends('personal.layouts.main')
@section('content')
<div>
    @include('layouts.header')
</div>
<div class="app-wrapper">
    @include('personal.layouts.sidebar')

    <main class="app-main">
        <h2>Комментарии</h2>
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-5">
                    @foreach($comments as $comment)
                        <div class="col-md-4 mb-4">
                            <div class="card" style="height: 500px;"> <!-- Фиксированная высота карточки -->
                                <div class="card-header">
                                    <h5 class="card-title">{{ $comment->post->title }}</h5>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    @if($comment->post->preview_image)
                                        <img src="{{ asset('storage/' . $comment->post->preview_image) }}" class="img-fluid mb-3" alt="Preview Image" style="max-height: 280px; width: auto; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('default-image.png') }}" class="img-fluid mb-3" alt="Default Image" style="max-height: 300px; width: auto; object-fit: cover;">
                                    @endif
                                    <p class="card-text" style="flex-grow: 1;">
                                        {{ Str::limit($comment->message, 100, '...') }} <!-- Ограничение на количество символов -->
                                    </p>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="{{ route('admin.post.edit', $comment->id) }}" class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i> Редактировать
                                        </a>
                                        <form action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i> Удалить
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>
        </section>
    </main>

    <footer class="app-footer">
        <!-- Footer content here -->
    </footer>
</div>
@endsection
