@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div> --}}
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Daftar Product
                  <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                </li>
            </ul>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Product</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Baju Kemeja</td>
                        <td>Rp 99.000</td>
                        <td>
                            <a href="" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                            {{-- <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                            @role('admin')
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            @endrole
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
