@extends('admin::layouts.master')

@section('content')
    <div>
        <h1>Permissions</h1>
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Guard Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>{{ $permission->created_at }}</td>
                    <td>{{ $permission->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
