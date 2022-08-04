@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit user</h1>
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
            <form action="{{ route('user.update', $user->id) }}" method = "POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label>Name
                    <input type="text" value="{{ $user->name ?? old('name') }}" name="name" class="form-control" placeholder="Name">
                    </label>
                </div>
                <div class="form-group">
                    <label>Surname
                    <input type="text" value="{{ $user->surname ?? old('surname') }}" name="surname" class="form-control" placeholder="Surname">
                    </label>
                </div>
                <div class="form-group">
                    <label>Patronymic
                    <input type="text" value="{{ $user->patronymic ?? old('patronymic') }}" name="patronymic" class="form-control" placeholder="Patronymic">
                    </label>
                </div>
                <div class="form-group">
                    <label>Gender
                    <select name="gender" class="custom-select form-control" id="exampleSelectBorder">
                        <option disabled selected>Gender</option>
                        <option {{ $user->gender == 1 || old('gender') == 1 ? ' selected' : '' }} value="1">Male</option>
                        <option {{ $user->gender == 2 || old('gender') == 2 ? ' selected' : '' }} value="2">Female</option>
                    </select>
                    </label>
                </div>
                <div class="form-group">
                    <label>Age
                    <input type="number" value="{{ $user->age ?? old('age') }}" name="age" class="form-control" placeholder="Age">
                    </label>
                </div>
                <div class="form-group">
                    <label>Address
                    <input type="text" value="{{ $user->address ?? old('address') }}" name="address" class="form-control" placeholder="Address">
                    </label>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Edit user">
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
