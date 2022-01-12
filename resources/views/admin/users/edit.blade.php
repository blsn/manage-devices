@extends('templates.default')

@section('content')
<div class="container">
    <h1>Edit</h1>
    <p>Edit user</p>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        @method('PATCH')
                        @include('admin.users.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
