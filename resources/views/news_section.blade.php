<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h3 class="h1">News & Articles</h3>
        </div>
    </div>
    <div class="row">
        <div class="card-deck">
        @foreach ($news as $news_item)
            <div class="col-lg-4">
                <div class="card border-0">
                    <img src="/storage/news-images/{{$news_item->image}}" class="card-img-top br-1 news-img" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{$news_item->headline}}</h4>
                        <p class="card-text">{!! \Illuminate\Support\Str::words($news_item->content,15)!!}.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>