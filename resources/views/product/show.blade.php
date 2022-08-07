@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
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
                    <div class="card-header d-flex p-3">
                        <div class="mr-3">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info">Edit product</a>
                        </div>
                        <div>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete product">
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td>{{ $product->title }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>{{ $product->category->title }}</td>
                            </tr>
                            <tr>
                                <td>Number</td>
                                <td>{{ $product->number }}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <td>Count</td>
                                <td>{{ $product->count }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td>Content</td>
                                <td>{{ $product->content }}</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td><img src="{{ asset('storage/' . $product->preview_image) }}" alt="product img" width="50px">
                                </td>
                            </tr>
                            <tr>
                                <td>Tags</td>
                                <td>
                                    @foreach($product->tags as $tag)
                                        {{ $tag->title }}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Colors</td>
                                <td>
                                    @foreach($product->colors as $color)
                                        {{ $color->title }}
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
