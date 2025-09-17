@extends('course::backend.layouts.app')

@section('content')
<div class="container">
    <h2>Trainers</h2>
    <a href="{{ route('trainers.create') }}" class="btn btn-primary mb-3">Add Trainer</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Expertise</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainers as $trainer)
            <tr>
                <td>{{ $trainer->name }}</td>
                <td>{{ $trainer->email }}</td>
                <td>{{ $trainer->phone }}</td>
                <td>{{ $trainer->expertise }}</td>
                <td>
                    <a href="{{ route('trainers.edit', $trainer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
