<div class="mb-0 content">
    <!-- Horizontal Navigation - Hover Normal -->
    <div class="p-3 mb-0 rounded bg-body-light push">
        <!-- Toggle Navigation -->
        <div class="d-lg-none">
            <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
            <button type="button" class="btn w-100 btn-light d-flex justify-content-between align-items-center"
                data-toggle="class-toggle" data-target="#horizontal-navigation-hover-normal" data-class="d-none">
                Menu - Hover Normal
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- END Toggle Navigation -->

        <!-- Navigation -->
        <div id="horizontal-navigation-hover-normal" class="mt-2 d-none d-lg-block mt-lg-0">
            <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-justify">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->routeIs('laboratorios.index') ? ' active' : '' }}" href="{{route('laboratorios.index')}}">
                        <i class="nav-main-link-icon fa fa-rocket"></i>
                        <span class="nav-main-link-name">Laboratorios</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->routeIs('principios.index') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon fa fa-boxes"></i>
                        <span class="nav-main-link-name">Principios</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->routeIs('lineasFarmaceuticas.index') ? ' active' : '' }}" href="{{route('lineasFarmaceuticas.index')}}">
                        <i class="nav-main-link-icon fa fa-money-bill"></i>
                        <span class="nav-main-link-name">Lineas Farmaceuticas</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->routeIs('categorias.index') ? ' active' : '' }}" href="#">
                        <i class="nav-main-link-icon fa fa-globe"></i>
                        <span class="nav-main-link-name">Categorias</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Navigation -->
    </div>
    <!-- END Horizontal Navigation - Hover Normal -->
</div>
