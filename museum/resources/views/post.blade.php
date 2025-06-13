@extends('layouts.app')
@section('content')

@include('layouts.header')

<div class="app-wrapper">
    <main class="app-main">
        <section class="featured-posts-section d-flex flex-column align-items-center" style="margin-top: 110px;">

            <div style="max-width: 60%;">
                <div class="featured-post blog-post" data-aos="fade-up" style="margin-bottom: 20px; width: 100%; max-width: 90%;">
                   

                <a href="" style="text-decoration: none; color: inherit; max-width: 90%">
                        <h2 class="blog-post-title">{{ $post->title }}</h2>
                        <p class="post-date">
                            @isset($post->created_at)
                                {{ $post->created_at->format('d.m.Y') }}
                            @else
                                Дата не указана
                            @endisset
                        </p>

                        <div class="blog-post-thumbnail-wrapper text-center">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="Изображение поста" class="img-fluid mx-auto" style="width: 90%; height: auto;">
                        </div>
                        
                        <div class="post-actions">
                            @if($post->tags->count() > 0)
                                <div class="post-tags">
                                    @foreach($post->tags as $tag)
                                        <span class="tag">{{ $tag->title }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        
                        <p class="blog-post-description" style="margin-top: 20px;">
                            {!! $post->content !!}
                        </p>

                        <!-- Обновленный блок лайков и комментариев -->
                        <div style="margin-top: 20px; display: flex; align-items: center;">
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
                                <a href="#comments" class="text" style="text-decoration: none; color: inherit; display: flex; align-items: center; font-size: 30px; line-height: 1;">
                                    <i class="far fa-comments"></i>
                                    <span style="font-size: 20px; margin-left: 10px; vertical-align: middle;">{{ $post->comments()->count() }}</span>
                                </a>
                            </div>
                            <!-- Условный вывод для администраторов -->
                        @if(auth()->user() && auth()->user()->isAdmin())
                        <div class="nav-item">
                            <a href="{{ route('admin.post.edit', $post->id) }}" class="nav-link" style="font-size: 25px;">
                                <i class="fa-solid fa-pen-fancy"></i>
                            </a>
                        </div>
                        @endif
                        </div>
                    </a>

                    <!-- Комментарии -->
                    <div id="comments" class="mt-4">
                        <h4 class="mb-4">Комментарии</h4>
                        
                        @if($comments->isEmpty())
                            <div class="alert alert-info">
                                Пока нет комментариев. Будьте первым, кто оставит комментарий!
                            </div>
                        @else
                            @foreach($comments as $comment)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <img class="rounded-circle me-3" src="{{ $comment->user->user_image ? asset('storage/' . $comment->user->user_image) : asset('default-avatar.png') }}" width="50" height="50" alt="user image">
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <a href="{{ route('profile', $comment->user->id) }}" class="text-decoration-none text-dark">
                                                            <div class="d-flex align-items-center">
                                                                <span class="fw-semibold me-1" style="font-size: 20px;"> {{ $comment->user->username }}</span>
                                                            </div>
                                                        </a>
                                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                    </div>
                                                    
                                                </div>
                                                <p class="mt-2">{{ $comment->message }}</p>
                                                
                                                <button class="reply-btn position-relative overflow-hidden" 
                                                    data-comment-id="{{ $comment->id }}"
                                                    style="
                                                        background: transparent;
                                                        border: none;
                                                        color: #3b82f6;
                                                        padding: 6px 12px;
                                                        border-radius: 18px;
                                                        font-size: 0.875rem;
                                                        font-weight: 500;
                                                        transition: all 0.3s ease;
                                                        cursor: pointer;
                                                    ">
                                                <span class="d-flex align-items-center gap-2">
                                                    <i class="fas fa-reply" style="font-size: 0.8rem;"></i>
                                                    <span>Ответить</span>
                                                </span>
                                                
                                                <!-- Эффект при наведении -->
                                                <span class="position-absolute top-0 left-0 w-100 h-100 bg-blue-100 opacity-0" 
                                                    style="
                                                        z-index: -1;
                                                        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
                                                        transform: scaleX(0);
                                                        transform-origin: left;
                                                        border-radius: 18px;
                                                    "></span>
                                            </button>
                                                
                                                <!-- Форма ответа (скрыта по умолчанию, появляется при клике на "Ответить") -->
                                                <div class="reply-form mt-3 ps-4 border-start border-2 border-light" id="reply-form-{{ $comment->id }}" style="display: none;">
                                                    <form action="{{ route('personal.comment.reply', $comment->id) }}" method="POST" class="needs-validation" novalidate>
                                                        @csrf
                                                        <div class="mb-2 position-relative">
                                                            <!-- Авторасширяющееся текстовое поле -->
                                                            <textarea 
                                                                name="message" 
                                                                class="form-control auto-expand rounded-3 shadow-sm" 
                                                                rows="1"
                                                                placeholder="Напишите ответ..."
                                                                style="resize: none; min-height: 42px; padding-right: 50px;"
                                                                required
                                                            ></textarea>
                                                            
                                                            <!-- Кнопка отправки с иконкой -->
                                                            <button type="submit" 
                                                                    class="btn btn-sm position-absolute end-0 bottom-0 m-1 rounded-circle" 
                                                                    style="width: 36px; height: 36px;"
                                                                    title="Отправить ответ">
                                                                <i class="fa-solid fa-paper-plane"></i>
                                                            </button>
                                                        </div>
                                                        
                                                        <!-- Вспомогательные элементы -->
                                                        <div class="d-flex justify-content-between align-items-center mt-1">
                                                            <small class="text-muted">Нажмите Enter для отправки</small>
                                                            <button type="button" 
                                                                    class="btn btn-sm btn-link text-danger p-0" 
                                                                    onclick="document.getElementById('reply-form-{{ $comment->id }}').style.display='none'">
                                                                Отмена
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                                <!-- Ответы на комментарий -->
                                                @if($comment->replies->isNotEmpty())
                                                    <div class="replies mt-3 ms-4">
                                                        @foreach($comment->replies as $reply)
                                                        <div class="card mb-2 position-relative">
                                                            <!-- Кнопка удаления в правом верхнем углу -->
                                                            @auth
                                                                @if(auth()->user()->id === $reply->user->id)
                                                                <form action="{{ route('replies.destroy', $reply->id) }}" method="POST" class="position-absolute top-0 end-0 mt-2 me-2">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" 
                                                                            class="btn btn-sm btn-link text-danger p-0"
                                                                            onclick="return confirm('Вы уверены, что хотите удалить этот ответ?')"
                                                                            title="Удалить ответ">
                                                                        <i class="fas fa-trash-alt opacity-75 hover-opacity-100"></i>
                                                                    </button>
                                                                </form>
                                                                @endif
                                                            @endauth
                                                            
                                                            <div class="card-body">
                                                                <div class="d-flex">
                                                                    <img class="rounded-circle me-3" 
                                                                        src="{{ $reply->user->user_image ? asset('storage/' . $reply->user->user_image) : asset('default-avatar.png') }}" 
                                                                        width="40" height="40" alt="user image">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex justify-content-between align-items-start">
                                                                            <div>
                                                                                <h6 class="mb-1">{{ $reply->user->username }}</h6>
                                                                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mt-2 mb-0">{{ $reply->message }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Форма добавления комментария -->
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Оставить комментарий</h5>
                            @if(auth()->check())
                                <form action="{{ route('personal.comment.store', $post->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <textarea name="message" class="form-control" rows="3" placeholder="Ваш комментарий..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </form>
                            @else
                                <div class="alert alert-warning">
                                    Пожалуйста, <a href="{{ route('login') }}">войдите</a> или <a href="{{ route('register') }}">зарегистрируйтесь</a>, чтобы оставить комментарий.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<style>
    /* Обновленные стили для комментариев */
    .card {
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .replies .card {
        background-color: #f8f9fa;
    }
    .reply-btn {
        transition: all 0.3s;
    }
    .reply-btn:hover {
        transform: translateY(-2px);
    }
        .comment-avatar {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
    .reply-avatar {
        width: 40px;
        height: 40px;
    }
    .replies {
        border-left: 3px solid #eee;
        padding-left: 20px;
    }
    .comment-card {
        transition: transform 0.2s;
    }
    .comment-card:hover {
        transform: translateY(-2px);
    }
    .comment-actions {
        opacity: 0;
        transition: opacity 0.2s;
    }
    .comment-card:hover .comment-actions {
        opacity: 1;
    }
    /* Анимация при наведении */
    .reply-btn:hover {
        color: #2563eb;
        transform: translateY(-1px);
    }
    
    .reply-btn:hover span.bg-blue-100 {
        opacity: 0.3;
        transform: scaleX(1);
    }
    
    /* Анимация при клике */
    .reply-btn:active {
        transform: translateY(1px) scale(0.98);
    }
    
    /* Анимация при фокусе (для доступности) */
    .reply-btn:focus-visible {
        outline: 2px solid #3b82f6;
        outline-offset: 2px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Лайки
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
                        icon.classList.toggle('fas');
                        icon.classList.toggle('far');
                        icon.classList.toggle('text-danger');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });

        // Ответы на комментарии
        document.querySelectorAll('.reply-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const formId = 'reply-form-' + this.dataset.commentId;
                const form = document.getElementById(formId);
                form.style.display = form.style.display === 'block' ? 'none' : 'block';
                
                if (form.style.display === 'block') {
                    form.querySelector('textarea').focus();
                }
            });
        });

        // AJAX отправка комментариев
        document.querySelectorAll('.comment-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
    // Обработка удаления комментариев через AJAX
document.querySelectorAll('.delete-comment-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!confirm('Удалить комментарий?')) return;
        
        fetch(this.action, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                this.closest('.comment-card').remove();
                // Можно добавить уведомление об успешном удалении
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

// Аналогично для ответов
document.querySelectorAll('.delete-reply-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!confirm('Удалить ответ?')) return;
        
        fetch(this.action, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (response.ok) {
                this.closest('.reply-card').remove();
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
<!-- JavaScript для улучшения UX -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Авторасширение textarea
    document.querySelectorAll('.auto-expand').forEach(el => {
        el.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
    
    // Отправка по Enter (с проверкой Shift+Enter)
    document.querySelectorAll('.reply-form textarea').forEach(el => {
        el.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                this.closest('form').requestSubmit();
            }
        });
    });
});
</script>
<script>
// нажатие на кнопку ответить на комментарий
document.querySelectorAll('.reply-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        this.classList.add('active');
        setTimeout(() => this.classList.remove('active'), 300);
    });
});
</script>
@endsection