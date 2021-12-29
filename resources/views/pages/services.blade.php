@extends('templates.default')

@section('content')
    <h1>{{ $title }}</h1>
    <p>This is services...</p>
    @if (count($services) > 0)
        <ul class="list-group">
            @foreach ($services as $service)
                <li class="list-group-item">{{ $service }}</li>
            @endforeach
        </ul>
    @else
        <p>No xervices found</p>
    @endif
@endsection
