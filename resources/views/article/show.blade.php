<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">
                    {{ $article->title }}
                </h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 d-flex flex-column">
                <img src="{{ Storage::url($article->image) }}" class="img-fluid" 
                    alt="Immagine dell'articolo: {{ $article->title }}">
                    <div class="text-center">
                        <h2>{{ $article->subtitle }}</h2>
                        @if {$article->category}
                        <p class="small text-muted">Categoria:
                            <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize text-muted">{{ $article->category->name }}</a>     
                        </p>
                        @else
                            <p class="small text-muted">Nessuna categoria</p>
                        @endif
                        <div class="text-muted my-3">
                            <p>Redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}</p>
                            <a href="{{route('article.byUser', $article->user)}}" class="text-capitalize text-muted">{{ $article->user->name }}</a>
                        </div>
                    </div>
                    <hr>
                    <p>{{$article->body}}</p>
                    <div class="text-center">
                        <a href="{{route('article.index')}}" class="text-secondary">Vai alla lista degli articoli</a>
                    </div>
                    <div class="d-flex justify-content-between">
                        @if (Auth::user() && Auth::user()->is_revisor)
                        <form action="{{route('revisor.acceptArticle', $article)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success text-white">Accetta articolo</button>
                        form action="{{route('revisor.rejectArticle', $article)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger text-white">Rifiuta articolo</button>
                    </form>
                        @endif
                    </form>
                    </div>
            </div>
        </div>
    </div>
</x-layout>