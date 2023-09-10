@php
    $user = Auth::user();
@endphp

<header class="w-100 d-flex">
    <nav class="d-flex w-100 justify-content-between align-items-center">
        <a href=""></a>
        <button class="d-lg-none"></button>
        <div class="d-flex w-50 justify-content-between align-items-center pe-5 header-list">
            <ul class="col-8 d-flex justify-content-center align-items-center mb-0">
                <li class="item-links">
                    <a href="/home">Home</a>
                </li>
                @auth()
                    <li class="item-links">
                        <a href="#">Mis Comentarios</a>
                    </li>
                @endauth
            </ul>
            <ul class="col-4 d-flex justify-content-between align-items-center mb-0">
                @auth()
                    <li>
                        {{-- ! ACA VA UN ICONO DE NOTIFICACION --}}
                        <a href="#"></a>
                    </li>
                    <li class="li-option d-flex flex-column">
                        {{-- ! ACA VA UN ICONO DE CONFIGURACION --}}
                        <a href="#" class="link-suboption">
                            <img src="{{ $user->image }}" class="image-profile-header">
                        </a>
                        <ul class="setting-options">
                            <li class="suboption-container d-flex justify-content-start align-items-center">
                                <a href="" class="">Perfil</a>
                            </li>
                            <li class="suboption-container d-flex justify-content-start align-items-center">
                                <a href="/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                @endauth
                {{-- @endguest
                    <li><button>Sign in</button></li>
                    <li><button>Sign up</button></li> --}}
            </ul>
        </div>
    </nav>
</header>
