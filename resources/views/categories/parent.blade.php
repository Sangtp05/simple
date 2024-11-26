@extends('layouts.app')

@section('content')
<x-breadcrumb />
<section class="section">
    <div class="container">
        <h1>{{ $categoryParent->name }}</h1>

        <div class="row">
            <div class="col-md-3">
                <!-- Danh sách category cha -->
                <div class="card">
                    <div class="card-header">
                        Danh mục chính
                    </div>
                    <div class="card-body">
                        <h5>{{ $categoryParent->name }}</h5>
                        <!-- Danh sách category con -->
                        <ul class="list-unstyled">
                            @foreach($categoryParent->children as $child)
                            <li>
                                <a href="{{ route('categories.child.show', [$categoryParent->slug, $child->slug]) }}">
                                    {{ $child->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <!-- Hiển thị thông tin về category cha và các category con nổi bật -->
                @foreach($categoryParent->children as $child)
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>{{ $child->name }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $child->description }}</p>
                        <a href="{{ route('categories.child.show', [$categoryParent->slug, $child->slug]) }}"
                            class="btn btn-primary">
                            Xem sản phẩm
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
