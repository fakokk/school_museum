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

            <h1>Главная страница</h1>


        </main>
        <!--end::App Main-->

        <!--begin::Footer-->
        <footer class="app-footer">
            <!-- Footer content here -->
        </footer>
        <!--end::Footer-->
    </div>

    <script>
        
    </script>
    @endsection
