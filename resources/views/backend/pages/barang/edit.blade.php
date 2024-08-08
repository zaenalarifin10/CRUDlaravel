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
                        <form action="{{  route('admin.barang.update', $barang->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <h1>EDIT BARANG</h1>
                            <div class="form-group row">
                                <label for="kode" class="col-sm-3 col-form-label">Kode Barang:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kode" name="kode" value= "{{ $barang->kode }}" readonly>
                                    @error('kode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama Barang:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="barang" name="barang" value= "{{ $barang->barang }}">
                                    @error('barang')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kategori" class="col-sm-3 col-form-label">Kategori:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategori" name="kategori"  value= "{{ $barang->kategori }}">
                                    @error('kategori')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">total:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="total" name="total" value= "{{ $barang->total }}">
                                    @error('barang')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stock" class="col-sm-3 col-form-label">Stok:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="stok" name="stok" value= "{{ $barang->stok }}">
                                    @error('stok')
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