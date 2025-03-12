@section('content')
    <h2>Bài viết với tag: {{ $tag }}</h2>

    @foreach ($posts as $post)
        <div>
            <h3><a href="{{ route('user.single.news', $post->id) }}">{{ $post->title }}</a></h3>
            <p>{{ Str::limit($post->content, 100) }}</p>
        </div>
    @endforeach

    <div class="pagination-wrap">
        <ul>
            <li>
                @if ($posts->currentPage() > 1)
                    {{-- <a href="{{ $products->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a> --}}
                    <a href="{{ $posts->appends(request()->except('page'))->previousPageUrl() }}"><i
                            class="fas fa-angle-left"></i></a>
                @endif
            </li>
            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                @if ($posts->currentPage() == $i)
                    <li>
                        <a class="active">{{ $i }}</a>
                    </li>
                @else
                    <li>
                        {{-- <a href="{{ $products->url($i) }}">{{ $i }}</a> --}}
                        <a href="{{ $posts->appends(request()->except('page'))->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            <li>
                @if ($posts->currentPage() < $posts->lastPage())
                    <a href="{{ $posts->appends(request()->except('page'))->nextPageUrl() }}"><i
                            class="fas fa-angle-right"></i></a>
                    {{-- <a href="{{ $products->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a> --}}
                @endif
            </li>
        </ul>
    </div>
@endsection
