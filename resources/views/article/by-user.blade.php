<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
               Articoli di: {{$user->name}}
            </h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
            <div class="col-12 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" 
                        alt="Immagine dell'articolo" {{ $article->title }}>
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-subtitle">{{ $article->subtitle }}</p>
                        @if {$article->category}
                        <p class="small text-muted">Categoria:
                            <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize text-muted">{{ $article->category->name }}</a>     
                        </p>
                        @else
                            <p class="small text-muted">Nessuna categoria</p>
                        @endif
                        <p class="small text-muted my-0">
                            @foreach {{$article->tags as $tag}}
                            #{{$tag->name}}
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>