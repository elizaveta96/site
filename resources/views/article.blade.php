@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="h4"> {{ $article->title }} </p>
            </div>
        </div>

        <div class="row article-info">
            <div class="article-likes">
                <div class="article-likes--icon" onclick="likeArticle()" data-identifier="{{ $article->id }}">
                </div>
                <div class="article-likes--count" id="likes-count">
                    {{ $article->likes }}
                </div>
            </div>

            <div class="article-views">
                <div class="article-views--icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                </div>
                <div class="article-views--count">
                    <p id="views" data-identifier="{{ $article->id }}">{{ $article->views }}</p>
                </div>
            </div>
        </div>

        <div class="article-tags">
            @foreach($article->tags as $tag)
                <span class="article-tag badge rounded-pill bg-secondary"> <a class="text-light" href="{{ route('tag', ['slug' => $tag->url]) }}"> {{ $tag->label }} </a> </span>
            @endforeach
        </div>


        <div class="row article-content">
            <div class="col-7">
                <img src="https://via.placeholder.com/520x325/adebd8?text=ArticlePreview" />
            </div>
            <div class="col-5 article-content--text">
                {{ $article->text }}
            </div>
        </div>

        <hr align="center" color="Red" style="margin: 40px 0;"/>


        <form id="add-comment">
            <p class="h5"> Оставить комментарий </p>
            @csrf
            <input type="hidden" name="identifier" value="{{ $article->id }}">
            <div class="mb-3">
                <label for="subject" class="form-label">Тема сообщения</label>
                <input type="text" name="subject" class="form-control" id="subject">
                <span class="text-danger" style="display: none" id="subject-error"></span>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Сообщение</label>
                <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                <span class="text-danger" style="display: none" id="body-error"></span>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>

        <div id="add-comment-success" class="alert alert-success" role="alert" style="display: none">
            Сообщение успешно отправлено
        </div>
    </div>

@endsection
