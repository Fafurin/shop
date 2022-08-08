@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Main</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Create product</a>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Number</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Group</th>
                                <th>Old price</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Count</th>
                                <th>Description</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Colors</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><a href="{{ route('product.show', $product->id) }}">{{ $product->number }}</a>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>{{ $product->group->title }}</td>
                                    </td>
                                    <td>{{ $product->old_price }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount }}</td>
                                    <td>{{ $product->count }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->content }}</td>
                                    <td><img src="{{ asset('storage/' . $product->preview_image) }}" alt="product img"
                                             width="50px"></td>
                                    <td>
                                        @foreach($product->tags as $tag)
                                            {{ $tag->title }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($product->colors as $color)
                                            {{ $color->title }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
