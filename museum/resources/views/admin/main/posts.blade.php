<!-- Original file: resources/views/admin/layouts/main.blade.php -->
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
            <div class="row">
                <div class="col-12">

                    <h3 class="mb-3 mt-3">Посты</h3>
                    <h4 class="mb-3 mt-3">Новостные материалы сайта.</h4>


                    @foreach($posts as $post)
                        <div class="post-item">
                            <a href="{{ route('post.show', $post->id) }}">
                                <img src="{{ $post->preview_image ? asset('storage/' . $post->preview_image) : asset('default-post-image.jpg') }}" 
                                     class="post-image" alt="{{ $post->title }}">
                            </a>
                            <div class="post-content" style="display: flex; flex-direction: column; height: 100%;">
                                <div style="flex-grow: 1;"> <!-- Этот блок займет все доступное пространство -->
                                    <h3 class="post-title">{{ $post->title }}</h3>
                                    <div class="post-footer" style="display: flex; justify-content: space-between; align-items: center; margin-top: auto;">
                                        <div class="post-meta">
                                            <span>{{ $post->created_at->locale('ru')->diffForHumans() }}</span>
                                        </div>
                                        <div class="post-actions">
                                            <a href="{{ route('post.show', $post->id) }}" class="action-btn">
                                                <i class="fas fa-eye"></i> Просмотр
                                            </a>
                                        </div>
                                    </div>
                                    <p class="post-text">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                                </div>
                                
                                
                                
                            </div>
                            <!-- Правый столбец действий -->
                        <div class="post-actions-column">
                            <!-- Статистика -->
                            <div class="post-stats card shadow-sm mb-3">
                                <div class="card-body py-2">
                                    <div class="stat-item d-flex align-items-center mb-2">
                                        <i class="fas fa-heart text-danger me-2"></i>
                                        <span class="text-muted">{{ $post->likes_count ?? $post->likes()->count() }}</span>
                                    </div>
                                    <div class="stat-item d-flex align-items-center">
                                        <i class="fas fa-comment text-primary me-2"></i>
                                        <span class="text-muted">{{ $post->comments_count ?? $post->comments()->count() }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Действия -->
                            <div class="action-buttons card shadow-sm">
                                <div class="card-body p-0">
                                    <a href="{{ route('post.show', $post->id) }}" class="action-btn d-block px-3 py-2 text-decoration-none">
                                        <i class="fas fa-eye me-2"></i> Просмотр
                                    </a>
                                    <hr class="my-1">
                                    <a href="{{ route('admin.post.edit', $post->id) }}" class="action-btn d-block px-3 py-2 text-decoration-none">
                                        <i class="fas fa-edit me-2"></i> Редактировать
                                    </a>
                                    <hr class="my-1">
                                    <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn w-100 text-start px-3 py-2 bg-transparent border-0">
                                            <i class="fas fa-trash me-2"></i> Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                            </div>
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
<style>
        .post-item {
            display: flex;
            gap: 1.5rem;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
            min-height: 250px; /* Фиксированная минимальная высота */
            align-items: stretch; /* Важно! */
        }

        .post-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .post-text {
            flex-grow: 1; /* Заставляет текст занимать доступное пространство */
            margin-top: 20px;
            font-size: 20px;
        }

        .post-footer {
            margin-top: auto; /* Прижимает футер к низу */
            padding-top: 10px; /* Отступ сверху */
            border-top: 1px solid #eee; /* Визуальное разделение */
        }
        
        .post-item:last-child {
            border-bottom: none;
        }
        
        .post-image {
            width: 350px;
            height: auto;
            border-radius: 6px;
            object-fit: cover;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .action-btn {
            font-size: 20px;
            color: inherit;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .post-title {
            font-weight: 600;
            margin: 0 0 0.5rem 0;
            color: var(--dark);
        }
        
        
        .post-meta {
            color: var(--gray);
            font-size: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .post-actions {
            margin-top: 0.5rem;
            display: flex;
            gap: 0.8rem;
        }
        .post-actions-column {
            width: 220px;
            position: sticky;
            top: 20px;
        }

        .post-stats {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .action-buttons {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .action-btn {
            display: block;
            padding: 10px 15px;
            color: #333;
            transition: all 0.2s;
            font-size: 14px;
        }

        .action-btn:hover {
            background-color: #f8f9fa;
            color: #0d6efd;
            transform: translateX(3px);
        }

        .action-btn i {
            width: 20px;
            text-align: center;
        }

        .delete-btn:hover {
            color: #dc3545 !important;
        }

        .stat-item {
            padding: 5px 0;
            font-size: 14px;
        }

        .stat-item i {
            font-size: 16px;
        }

        hr {
            margin: 0;
            border-top: 1px solid #eee;
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
        @media (max-width: 768px) {
            .post-actions-column {
                width: 100%;
                position: static;
                margin-top: 20px;
            }
        }
</style>
@endsection
