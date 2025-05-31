@extends('layouts.app')
@section('content')

@include('layouts.header')

<div>
    @include('layouts.sidebar')
</div>
<div class="app-wrapper">
    <main class="app-main">
        <section class="featured-posts-section d-flex flex-column align-items-center">

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

                        <p style="margin-top: 20px;">
                            <span class="d-flex align-items-center">
                                <form action="{{ route('posts.like.store', $post->id) }}" method="POST" style="margin-right: 20px;">
                                    @csrf    
                                    <button type="submit" class="border-0 bg-transparent">
                                        @auth
                                            @if(auth()->user()->likedPosts->contains($post->id))
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif
                                        @endauth
                                        {{ $post->likes()->count() }}
                                    </button>
                                </form>
                                
                                <a href="#" class="text" style="text-decoration: none; color: inherit; font-size: 20px;">
                                    <i class="far fa-comments mr-1 icon-large"></i> {{ $post->comments()->count() }}
                                </a>
                            </span>

                            <span class="float-right">
                                <a href="{{ route('post.show', $post) }}" class="custom-button">Подробнее</a>
                            </span>
                        </p>
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
    
</script>

@endsection
