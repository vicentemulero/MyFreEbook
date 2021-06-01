<div class="container-fluid ">
    <div class="row">
        <div class="col-12 bg-dark" id="sticky-sidebar">
            <div class="nav flex-column flex-nowrap  text-white" id="divControlPanel">
                <div class="row">
                    <div class="col-12 col-md-4 text-center">
                        <h3 id="titleControlPanel">Panel de control</h3>
                    </div>
                    <div class="col-12 col-md-8">
                        <nav class="navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" id="buttonCollapseCP" type="button" data-toggle="collapse"
                                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav nav ">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Autor
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('AdminAuthor.index') }}">Listado
                                                de autores</a>
                                            <a class="dropdown-item" href="{{ route('AdminAuthor.create') }}">Añadir
                                                autor</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Libro
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('AdminBook.index') }}"> Listado de
                                                libros</a>
                                            <a class="dropdown-item" href="{{ route('AdminBook.create') }}">Añadir
                                                libro</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Género
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('AdminGenre.index') }}">Listado de
                                                géneros</a>
                                            <a class="dropdown-item" href="{{ route('AdminGenre.create') }}">Añadir
                                                género</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Usuario
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('AdminUser.index') }}">Listado de
                                                usuarios</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="col-12" id="mainAdmin">
<br>
