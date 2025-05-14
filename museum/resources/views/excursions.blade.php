    @extends('layouts.app')
    @section('content')
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!-- Header content here -->
        </nav>

        <!--begin::App Main-->
        <main class="app-main ">
            @include('layouts.header') <!-- Include the sidebar template -->

            <h1 class="ml-3">Новости</h1>
            <section class="featured-posts-section">

            @foreach($posts as $post)
            <div class="blog-post" data-aos="fade-up"> 
                <a class="blog-post-title"> 
                    {{ $post->title }} 
                </a>
                    <div class="thumbnail-wrapper"> 

                        <img src="https://vki5.okcdn.ru/i?r=CFtAm_VFBkioSGBqh1IWSogGXWP4QaAtZL9tDSXUYRjNm8vTyRnT8qoBYw-MsvAdMUatGswsbK9rxvYVRPF2k9oz7ZbfBPqcqQMrjAHYo5st89B1tVjuUM_6hXMAAAAp&dpr=2" alt="">

                        <p class="blog-post-category">{{ $post->content ? $post->content : 'Без описания' }}</p>

                        <p class="blog-post-category">{{ $post->category ? $post->category->title : 'Без категории' }}</p>
                    </div>
                </div>
                @endforeach
            </section>
        </main>

        <footer class="app-footer">
        </footer>
    </div>

    <script>
        
    </script>
    @endsection
