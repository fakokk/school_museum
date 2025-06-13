@extends('layouts.app')
@section('content')

@include('layouts.header')

<div class="app-wrapper">
    <main class="app-main">
        <section class="featured-posts-section d-flex flex-column align-items-center" style="margin-top: 110px;">

            @foreach($posts as $post)
            <div style="max-width: 60%;">
                <div class="featured-post blog-post" data-aos="fade-up" style="margin-bottom: 20px; width: 100%; max-width: 90%;">
                    
                    <a href="{{ route('post.show', $post) }}" style="text-decoration: none; color: inherit; max-width: 90%">
                        <h2 class="blog-post-title">{{ $post->title }}</h2>
                        <p class="post-date">{{ $post->created_at->format('d.m.Y') }}</p>

                        <div class="blog-post-thumbnail-wrapper text-center">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="Изображение поста" class="img-fluid mx-auto" style="width: 90%; height: auto;">
                        </div>
                        <p class="blog-post-description" style="margin-top: 20px;">
                            {{ Str::limit(strip_tags($post->content), 300, '...') }}
                        </p>

                        <div class="post-actions">
                            @if($post->tags->count() > 0)
                                <div class="post-tags">
                                    @foreach($post->tags as $tag)
                                        <span class="tag">{{ $tag->title }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div style="margin-top: 20px; display: flex; align-items: center;">
                            <!-- Лайки и комментарии -->
                            <div class="d-flex align-items-center" style="gap: 25px; margin-right: auto;">
                                <!-- Лайки -->
                                <form action="{{ route('posts.like.store', $post->id) }}" method="POST" class="like-form">
                                    @csrf    
                                    <button type="button" class="border-0 bg-transparent like-button p-0" data-post-id="{{ $post->id }}" style="font-size: 30px; line-height: 1;">
                                        @auth
                                            <i class="{{ auth()->user()->likedPosts->contains($post->id) ? 'fas fa-heart text-danger' : 'far fa-heart' }}"></i>
                                        @endauth
                                        <span class="like-count" style="font-size: 20px; vertical-align: middle;">{{ $post->likes()->count() }}</span>
                                    </button>
                                </form>

                                <!-- Комментарии -->
                                <a href="{{ route('post.show', $post) }}#comments" class="text" style="text-decoration: none; color: inherit; display: flex; align-items: center; font-size: 30px; line-height: 1;">
                                    <i class="far fa-comments"></i>
                                    <span style="font-size: 20px; margin-left: 10px; vertical-align: middle;">{{ $post->comments()->count() }}</span>
                                </a>
                            </div>

                            <!-- Кнопка "Подробнее" -->
                            <a href="{{ route('post.show', $post) }}" class="custom-button">Подробнее</a>
                        </div>
                    </a>
                    <hr>
                </div>
            </div>
            @endforeach

            <div class="d-flex justify-content-center">
                {{ $posts->links() }} 
            </div>

        </section>
    </main>

    <footer class="app-footer">
        <!-- Footer content here -->
    </footer>
</div>

<style>
    /* Ваши стили */
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const likeButtons = document.querySelectorAll('.like-button');

        likeButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const postId = this.getAttribute('data-post-id');
                const form = this.closest('form');
                const icon = this.querySelector('i');
                const likeCount = this.querySelector('.like-count');

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ post_id: postId })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        likeCount.textContent = data.likes_count;
                        
                        // Переключаем классы иконки
                        icon.classList.toggle('fas');
                        icon.classList.toggle('far');
                        icon.classList.toggle('text-danger');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Можно добавить уведомление пользователю об ошибке
                });
            });
        });
    });
</script>

@endsection