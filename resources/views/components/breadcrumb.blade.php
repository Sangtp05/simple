@if(count($breadcrumbs))
    <nav aria-label="breadcrumb" class="breadcrumb-wrapper">
        <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            {{-- Home luôn là item đầu tiên --}}
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="{{ route('homepage.index') }}" itemprop="item">
                    <span itemprop="name">Trang chủ</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            
            @foreach ($breadcrumbs as $index => $breadcrumb)
                <li class="breadcrumb-item {{ !isset($breadcrumb['url']) ? 'active' : '' }}"
                    itemprop="itemListElement" 
                    itemscope 
                    itemtype="https://schema.org/ListItem"
                    @if(!isset($breadcrumb['url'])) aria-current="page" @endif
                >
                    @if(isset($breadcrumb['url']))
                        <a href="{{ $breadcrumb['url'] }}" itemprop="item">
                            <span itemprop="name">{{ $breadcrumb['label'] }}</span>
                        </a>
                    @else
                        <span itemprop="name">{{ $breadcrumb['label'] }}</span>
                    @endif
                    <meta itemprop="position" content="{{ $index + 2 }}" />
                </li>
            @endforeach
        </ol>
    </nav>
@endif