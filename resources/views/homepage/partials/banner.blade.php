<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($banners as $banner)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach ($banners as $banner)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img class="d-block w-100" src="{{ Storage::url($banner->image) }}" alt="{{ $banner->url }}"
                    loading="lazy"
                    onerror="this.src=`{{ asset('img/pages/banner/default.jpg') }}`"
                >
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <div><img src="{{ asset('img/icons/left-slide.svg') }}" alt="left-slide"></div>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <div><img src="{{ asset('img/icons/right-slide.svg') }}" alt="right-slide"></div>
    </a>
</div>