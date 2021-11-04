@extends('layouts.app')

@section('content')
    <section class="py-2 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Главная страница</h1>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($articles as $ley => $article)
                        <a href="/articles/{{ $article->url }}">
                            <div class="col">
                            <div class="card shadow-sm">
                                <div style="height: 225px;">
                                    <img src="https://via.placeholder.com/360x225/adebd8?text=ArticlePreview">
                                </div>

                                <div class="card-body">
                                    <p style="font-weight: 700;">{{ $article->title }}</p>
                                    <p class="card-text"> {{ $article->short_text }} </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
