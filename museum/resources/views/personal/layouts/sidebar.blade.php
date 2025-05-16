<!-- resources/views/admin/layouts/sidebar.blade.php -->
 <!-- компонент боковое меню -->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->

    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-header">ДЕЙСТВИЯ</li>

                <li class="nav-item">
                    <a href="{{route('personal.likes')}}" class="nav-link">
                        <i class="fa-solid fa-heart"></i>
                        <p>Понравившиеся публикации</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.comments') }}" class="nav-link">
                        <i class="fa-solid fa-comment"></i>
                        <p>Комментарии</p>
                    </a>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
