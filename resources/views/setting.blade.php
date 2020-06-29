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
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Daftar User
                </li>
            </ul>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row"> {{ $loop->iteration }} </th>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }}</td>
                            <td> {{ print_r($user->getRoleNames()[0], 1) }} </td>
                            <td>
                                <a href=" {{ url('/edit/'.$user->id) }} " class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
