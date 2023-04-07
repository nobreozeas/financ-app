<header>
    <nav class="navbar navbar-expand-md navbar_transparente">

        <div class="container">
            <div class="row row_menu">
                <div class="col">
                    <a href="{{route('dashboard.index')}}" class="navbar-brand" id="brand_desktop">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" width="150">
                    </a>

                    <a href="javascript:void(0)" class="navbar-brand" id="brand_mobile">
                        @if (Route::is('dashboard.index'))
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" width="150">
                        @else
                            <div class="d-flex align-items-center">
                                <a href=" javascript:void(0) " onclick="history.back()">
                                    <i class="fa fa-arrow-left" style="font-size: 30px;" aria-hidden="true"></i>
                                </a>
                            </div>

                        @endif
                    </a>



                </div>
                <div class="col menu_grande">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-decoration-none"><i
                                    class="fa-solid fa-house"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-decoration-none">Receitas</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-decoration-none">Despesas</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link text-decoration-none" type="button"
                                data-bs-toggle="modal" data-bs-target="#modalCategoria">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-decoration-none">Ajuda</a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <div class="btn_entrar">
                        <div class="dropdown">
                            <a href="#" class="text-decoration-none dropdown-toggle" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    Olá, Ozeas <div id="img_perfil"><span></span></div>
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </div>
                            </a>

                            <ul class="dropdown-menu dropdown-user">
                                <li><a class="dropdown-item" href="#"><i
                                            class="fa-solid fa-user me-3"></i>Perfil</a></li>
                                <li><a class="dropdown-item" href="#"><i
                                            class="fa-solid fa-cog me-3"></i>Configurações</a></li>
                                <li><a class="dropdown-item" href="#"><i
                                            class="fa-solid fa-sign-out me-3"></i>Sair</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>





            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="nav-toggler-icon">
                    <i class="fa-solid fa-bars"></i>
                </span>
            </button> --}}






        </div>

    </nav>
</header>

