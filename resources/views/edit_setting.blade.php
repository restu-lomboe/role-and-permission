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
            <form action="{{ url('/edit/'.$user->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select id="inputState" name="role" class="form-control">
                            <option selected disabled>Choose...</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Permission</label>
                    <div class="col-sm-10">
                        <select id="inputState" name="permission[]" multiple class="form-control">
                            <option selected disabled>Choose...</option>
                            @foreach ($permissions as $permission)
                                <option value="{{$permission->id}}">{{$permission->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-success w-100" value="SUBMIT">
            </form>
        </div>
    </div>
</div>
@endsection
