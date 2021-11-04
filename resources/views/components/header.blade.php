<header class="header">
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Статейник</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link @if(\Route::is('home')) active @endif" href="/"> Главная страница </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(\Route::is('articles') || \Route::is('article')) active @endif"
                       href="{{ route('articles') }}"> Каталог статей </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
