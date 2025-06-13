<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль | {{ $user->username }}</title>
    <style>
        :root {
            --primary: rgb(53, 73, 106);
            --primary-light: rgba(53, 73, 106, 0.1);
            --secondary: rgb(81, 113, 165);
            --dark: rgb(34, 47, 68);
            --light: rgb(240, 243, 248);
            --gray: rgb(117, 117, 117);
            --danger: rgb(198, 40, 40);
            --background: rgb(245, 247, 250);
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background);
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
        
        .profile-header {
            background: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        
        .myavatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-light);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .profile-info {
            flex: 1;
        }
        
        .profile-name {
            font-size: 1.5rem;
            margin: 0 0 0.5rem 0;
            color: var(--dark);
        }
        
        .profile-email {
            color: var(--gray);
            margin-bottom: 1rem;
        }
        
        .btn {
            display: inline-block;
            padding: 0.5rem 1.2rem;
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
            background: var(--dark);
            transform: translateY(-2px);
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
            margin-left: 0.5rem;
        }
        
        .btn-outline:hover {
            background: var(--primary-light);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 2rem;
        }
        
        .sidebar {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            height: fit-content;
        }
        
        .sidebar-title {
            font-size: 1.1rem;
            margin-top: 0;
            margin-bottom: 1rem;
            color: var(--dark);
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #eee;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 0.5rem 0;
            color: var(--gray);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .sidebar-menu a:hover {
            color: var(--primary);
        }
        
        .sidebar-menu a.active {
            color: var(--primary);
            font-weight: bold;
        }
        
        .sidebar-menu i {
            width: 20px;
            text-align: center;
            margin-right: 0.5rem;
        }
        
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .card {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .card-title {
            font-size: 1.2rem;
            margin-top: 0;
            margin-bottom: 1.5rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .card-title i {
            color: var(--primary);
        }
        
        .post-item {
            display: flex;
            gap: 1.5rem;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }
        
        .post-item:last-child {
            border-bottom: none;
        }
        
        .post-image {
            width: 120px;
            height: 90px;
            border-radius: 6px;
            object-fit: cover;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .post-content {
            flex: 1;
        }
        
        .post-title {
            font-weight: 600;
            margin: 0 0 0.5rem 0;
            color: var(--dark);
        }
        
        .post-text {
            color: var(--gray);
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
            display: flex;
            gap: 0.8rem;
        }
        
        .action-btn {
            color: var(--gray);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 0.3rem;
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
            color: var(--primary-light);
        }
        
        .empty-state p {
            margin: 0;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .stat-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: var(--gray);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
            width: 100%;
            box-sizing: border-box;
        }

        .stat-card {
            background: white;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow: hidden; /* Предотвращает выпадение содержимого */
            min-width: 0; /* Помогает с переполнением в flex/grid контексте */
        }

        .stat-number, .stat-label {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    @include('layouts.header')
    
    <div class="profile-header" style="margin-top: 110px;">
        <div class="profile-container">
            <img src="{{ $user->user_image ? asset('storage/' . $user->user_image) : asset('storage/images/default-avatar.png') }}" 
                 class="myavatar" alt="Аватар">
            <div class="profile-info">
                <h1 class="profile-name">{{ $user->username }}</h1>

                <div class="profile-status" style="margin-bottom: 1rem;">
                    @if($user->isOnline())
                        <span style="color: var(--primary); display: flex; align-items: center; gap: 0.3rem;">
                            <span style="display: inline-block; width: 8px; height: 8px; background-color: var(--primary); border-radius: 50%;"></span>
                            Онлайн
                        </span>
                    @else
                        <span style="color: var(--gray);">
                            Был(а) в сети: {{ $user->last_seen_at ? $user->last_seen_at->diffForHumans() : 'давно' }}
                        </span>
                    @endif
                </div>

                <div class="card mt-4" style="margin-bottom: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">О себе</h5>
                        <p class="card-text">
                            @if($user->profile_description)
                                {{ $user->profile_description }}
                            @else
                                Пользователь пока не добавил информацию о себе.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <aside class="sidebar">
            @auth
                @if(auth()->id() === $user->id)
                    <h2 class="sidebar-title">Меню</h2>
            <ul class="sidebar-menu">
                <li><a href="#" class="active"><i class="fas fa-user"></i> Профиль</a></li>
                <li><a href="#"><i class="fas fa-heart"></i> Лайки</a></li>
                <li><a href="#"><i class="fas fa-comment"></i> Комментарии</a></li>
                <li><a href="{{ route('personal.edit') }}"><i class="fas fa-cog"></i> Редактировать</a></li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline">Выйти</button>
                </form>
            </ul>
                @endif
            @endauth
            
            <h2 class="sidebar-title">Информация</h2>
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number">{{ $likedPosts->count() }}</div>
                    <div class="stat-label">Лайков</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ $comments->count() }}</div>
                    <div class="stat-label">Комментариев</div>
                </div>
            </div>
        </aside>
        
        <main class="main-content">
            <div class="card">
                <h2 class="card-title"><i class="fas fa-newspaper"></i> Понравилось</h2>
                @if($likedPosts->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-heart-broken"></i>
                        <p>Нет постов в избранном.</p>
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="card">
                <h2 class="card-title"><i class="fas fa-comment"></i> Комментарии</h2>
                
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
                                @auth
                                @if(auth()->id() === $user->id)
                    
                
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
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </main>
    </div>
</body>
</html>