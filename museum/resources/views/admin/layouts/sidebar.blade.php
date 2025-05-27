<!-- resources/views/admin/layouts/sidebar.blade.php -->
 <!-- компонент боковое меню -->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="{{ route('admin') }}" class="brand-link">
            <span class="brand-text fw-light">Виртуальный музей</span>
        </a>
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-header">БАЗА ДАННЫХ</li>

                <li class="nav-item">
                    <a href="{{route('admin.post.index')}}" class="nav-link">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>Публикации</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.showpiece.index')}}" class="nav-link">
                        <i class="fa-solid fa-box-archive"></i>
                        <p>Экспонаты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-grip-horizontal"></i>
                        <p>Категории</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tag.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-grip-horizontal"></i>
                        <p>Теги</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <p>Пользователи</p>
                    </a>
                </li>

                <li class="nav-header">АДМИНИСТРИРОВАНИЕ</li>

                <li class="nav-item">
                    <a href="{{ route('statist') }}" class="nav-link">
                        <i class="fa-solid fa-square-poll-vertical"></i>
                        <p>Статистика</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('comments') }}" class="nav-link">
                        <i class="fa-solid fa-comment"></i>
                        <p>Комментарии</p>
                    </a>
                </li>


                <li class="nav-header">НАВИГАЦИЯ ПО САЙТУ</li>

                
                <li class="nav-item">
                    <a href="{{ route('welcome')}}" class="nav-link">
                        <i class="fa-solid fa-door-open"></i>
                        <p>На сайт</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-ui-checks-grid"></i>
                        <p>
                            Компоненты
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./docs/components/main-header.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Контакты</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./docs/components/main-sidebar.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Обратная связь</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./docs/components/main-sidebar.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Документы</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
