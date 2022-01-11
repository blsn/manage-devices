@extends('templates.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{ $title }}</h1>
            <a class="btn btn-sm btn-success float-end" href="{{ route('admin.users.create') }}" role="button">Create</a>
            <p>These are users...</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                    <td>
                                        {{-- @can('edit-users') --}}
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id) }}" role="button">Edit</a>
                                        {{-- @endcan --}}
                                        {{-- @can('delete-users') --}}
                                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display: inline-block;">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
