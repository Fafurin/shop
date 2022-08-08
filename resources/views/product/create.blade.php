@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add product</h1>
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
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Title">
                    @error('title')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" value="{{ old('number') }}" name="number" class="form-control"
                           placeholder="Number">
                    @error('number')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="description" cols="30" rows="5" class="form-control"
                              placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea name="content" cols="30" rows="5" class="form-control"
                              placeholder="Content">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="number" value="{{ old('old_price') }}" name="old_price" class="form-control"
                           placeholder="Old price">
                    @error('price')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="number" value="{{ old('price') }}" name="price" class="form-control"
                           placeholder="Price">
                    @error('price')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="number" value="{{ old('discount') }}" name="discount" class="form-control"
                           placeholder="Discount">
                    @error('price')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="number" value="{{ old('count') }}" name="count" class="form-control"
                           placeholder="Count">
                    @error('count')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="preview_image" type="file" class="custom-file-input">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                    @error('preview_image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <select name="category_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected" disabled>Choose category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <select name="group_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected" disabled>Choose group</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->title }}</option>
                        @endforeach
                    </select>
                    @error('group_id')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a tag"
                            style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="colors[]" class="tags" multiple="multiple" data-placeholder="Select a color"
                            style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create product">
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
