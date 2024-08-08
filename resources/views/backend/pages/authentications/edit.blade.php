@extends('backend.pages.layouts.app')
@section('style')
<style>
    .container {
        max-width: 600px; /* Lebar maksimum kontainer */
    }
    .form-group.row {
        margin-bottom: 20px; /* Jarak antar baris form */
    }
    .btn-primary, .btn-warning {
        width: 100px; /* Lebar tombol */
    }
    /* Stylize input fields if needed */
    .form-control {
        /* Misalnya, menambahkan border-radius */
        border-radius: 5px;
    }
    h1{
        text-align: center;
        margin-bottom: 25px;
    }
</style>
@endsection
@section('content')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                    <!-- Page Heading -->
                    <div class="container mt-4">
                        <form action="{{ Route('update.user', ['user' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h1>EDIT BARANG</h1>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">username:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username"  value= "{{ $users->username }}">
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">email:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" value= "{{ $users->email }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">password:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="password" name="password" value= "{{ $users->password }}">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">status:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="status" name="status">
                                        <option value="active" {{$users->status == "active" ? "selected" : ""}}>Active</option>
                                        <option value="inactive" {{$users->status == "inactive" ? "selected" : ""}}>InActive</option>
                                      </select>
                                    @error('barang')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-warning ml-2" href="/tables">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
@endsection
