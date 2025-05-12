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
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Посты
                            <span class="nav-badge badge text-bg-secondary me-3">3</span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.post.index')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Пост</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./layout/fixed-sidebar.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Видео</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./layout/fixed-sidebar.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Фото</p>
                            </a>
                        </li>
                    </ul>
                </li>
                

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-table"></i>
                        <p>
                            Таблицы
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./tables/simple.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Пользователи</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">НАВИГАЦИЯ ПО САЙТУ</li>

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
                    <a href="./docs/color-mode.html" class="nav-link">
                        <i class="nav-icon bi bi-star-half"></i>
                        <p>Избранное</p>
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
                                <p>Main Header</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./docs/components/main-sidebar.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Main Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="./docs/faq.html" class="nav-link">
                        <i class="nav-icon bi bi-question-circle-fill"></i>
                        <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
