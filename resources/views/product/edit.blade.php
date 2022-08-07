@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <input type="text" value="{{ $product->title ?? old('title') }}" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <input type="text" value="{{ $product->number ?? old('number') }}" name="number" class="form-control" placeholder="Number">
                </div>
                <div class="form-group">
                    <textarea name="description" cols="30" rows="5" class="form-control"
                              placeholder="Description">{{ $product->description ?? old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <textarea name="content" cols="30" rows="5" class="form-control"
                              placeholder="Content">{{ $product->content ?? old('content') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="number" value="{{ $product->price ?? old('price') }}" name="price" class="form-control"
                           placeholder="Price">
                </div>
                <div class="form-group">
                    <input type="number" value="{{ $product->count ?? old('count') }}" name="count" class="form-control"
                           placeholder="Count">
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="preview_image" type="file" class="custom-file-input">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <select name="category_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected" disabled>Choose category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a tag"
                            style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($tags as $tag)
                            <option
                                {{is_array($product->tags->pluck('id')->toArray()) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                value="{{$tag->id}}">
                                {{$tag->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="colors[]" class="tags" multiple="multiple" data-placeholder="Select a color"
                            style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($colors as $color)
                            <option
                                {{is_array($product->colors->pluck('id')->toArray()) && in_array($tag->id, $product->colors->pluck('id')->toArray()) ? 'selected' : '' }}
                                value="{{$color->id}}">
                                {{$color->title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Edit product">
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
