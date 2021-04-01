@extends('layouts.global')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Foto Barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Foto</th>
                                    <th>Default</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($photos as $photo)
                                <tr>
                                    <td>{{ $photo->id }}</td>
                                    <td>{{ $photo->product->name }}</td>
                                    <td>
                                        <img src="{{ url($photo->photo) }}" alt="">
                                    </td>
                                    <td>{{ $photo->is_default ? 'Ya': 'Tidak' }}</td>
                                    <td>
                                        <form action="{{ route('product-galleries.destroy', $photo->id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5">
                                        Data tidak tersedia
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
