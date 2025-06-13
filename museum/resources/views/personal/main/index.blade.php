<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет | {{ Auth::user()->username }}</title>
    <style>
        :root {
            --primary: #3498db;
            --dark: #2c3e50;
            --light: #ecf0f1;
            --gray: #95a5a6;
            --danger: #e74c3c;
        }
        
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        .header {
            background: var(--dark);
            color: white;
            padding: 2rem 0;
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            margin-bottom: 1rem;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .card-title {
            font-size: 1.25rem;
            margin-top: 0;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #eee;
        }
        
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        
        .btn:hover {
            background: #2980b9;
            transform: translateY(-1px);
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid white;
            margin-left: 0.5rem;
        }
        
        .post-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
            align-items: flex-start;
        }
        
        .post-image {
            width: 120px;
            height: 90px;
            border-radius: 6px;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .post-image:hover {
            transform: scale(1.03);
        }
        
        .post-content {
            flex: 1;
        }
        
        .post-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }
        
        .post-text {
            color: #555;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .post-meta {
            color: var(--gray);
            font-size: 0.8rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .post-actions {
            margin-top: 0.5rem;
        }
        
        .action-btn {
            color: var(--gray);
            margin-right: 0.8rem;
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s;
        }
        
        .action-btn:hover {
            color: var(--primary);
        }
        
        .action-btn.danger:hover {
            color: var(--danger);
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem 0;
            color: var(--gray);
        }
        
        .empty-state i {
            font-size: 2rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <img src="{{ Auth::user()->user_image ? asset('storage/' . Auth::user()->user_image) : asset('default-avatar.png') }}" 
             class="avatar" alt="Аватар">
        <h1>{{ Auth::user()->username }}</h1>
        <p>{{ Auth::user()->email }}</p>
        <div>
            <a href="{{ route('personal.edit') }}" class="btn">Редактировать профиль</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-outline">Выйти</button>
            </form>
        </div>
    </div>
    
    <div class="container">
        <div class="card">
            <h2 class="card-title"><i class="fas fa-heart" style="color: #e74c3c;"></i> Лайки</h2>
            
            @if($likedPosts->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-heart-broken"></i>
                    <p>Вы пока не лайкнули ни одного поста</p>
                </div>
            @else
                @foreach($likedPosts as $post)
                    <div class="post-item">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ $post->preview_image ? asset('storage/' . $post->preview_image) : asset('default-post-image.jpg') }}" 
                                 class="post-image" alt="{{ $post->title }}">
                        </a>
                        <div class="post-content">
                            <h3 class="post-title">{{ $post->title }}</h3>
                            <p class="post-text">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                            <div class="post-meta">
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="post-actions">
                                <a href="{{ route('post.show', $post->id) }}" class="action-btn">
                                    <i class="fas fa-eye"></i> Читать
                                </a>
                                <form action="{{ route('personal.likes.delete', $post->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn danger" style="background: none; border: none; cursor: pointer;">
                                        <i class="fas fa-times"></i> Убрать лайк
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
        <div class="card">
            <h2 class="card-title"><i class="fas fa-comment" style="color: #3498db;"></i> Комментарии</h2>
            
            @if($comments->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-comment-slash"></i>
                    <p>Вы еще не оставляли комментариев</p>
                </div>
            @else
                @foreach($comments as $comment)
                    <div class="post-item">
                        <a href="{{ route('post.show', $comment->post_id) }}">
                            <img src="{{ $comment->post->preview_image ? asset('storage/' . $comment->post->preview_image) : asset('default-post-image.jpg') }}" 
                                 class="post-image" alt="{{ $comment->post->title }}">
                        </a>
                        <div class="post-content">
                            <h3 class="post-title">К посту: {{ $comment->post->title }}</h3>
                            <p class="post-text">{{ $comment->message }}</p>
                            <div class="post-meta">
                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="post-actions">
                                <a href="{{ route('post.show', $comment->post_id) }}" class="action-btn">
                                    <i class="fas fa-external-link-alt"></i> Перейти
                                </a>
                                <a href="#" class="action-btn">
                                    <i class="fas fa-edit"></i> Редактировать
                                </a>
                                <form action="#" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn danger" style="background: none; border: none; cursor: pointer;">
                                        <i class="fas fa-trash"></i> Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</body>
</html>