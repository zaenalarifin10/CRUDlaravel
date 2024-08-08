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
                        <form action="{{ Route('admin.barang.store') }}" method="POST">
                            @csrf
                            <h1>TAMBAH BARANG</h1>
                            <div class="form-group row">
                               <label for="nama" class="col-sm-3 col-form-label">Nama Barang:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="barang" name="barang" placeholder="Masukkan nama barang">
                                    @error('barang')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori" class="col-sm-3 col-form-label">Kategori:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan kategori barang">
                                    @error('kategori')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stock" class="col-sm-3 col-form-label">Total:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="total" name="total" placeholder="Masukkan stok barang">
                                    @error('stok')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>                            <div class="form-group row">
                                <label for="stock" class="col-sm-3 col-form-label">Stok:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan stok barang">
                                    @error('stok')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-warning ml-2" href="/barang">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
            <!-- End of Main Content -->
@endsection
