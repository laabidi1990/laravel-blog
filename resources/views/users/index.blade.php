@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        {{-- <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">
            Add User
        </a> --}}
    </div>

    <div class="card card-default">
        <div class="card-header">
            Users
        </div>

        <div class="card-body">
            @if ($users->count() > 0)
                <table class="table">
                    <thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                            <img width="50" height="50" style='border-radius:50%' 
                                    src="{{ Gravatar::src($user->email) }}" alt="avatar">
                            </td>

                            <td>
                                {{ $user->name }}
                            </td>

                            <td>
                                 {{ $user->email }}
                            </td>

                            <td>
                                <form action="{{ route('delete-user', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm float-right">
                                       Delete User
                                    </button>
                                </form>
                            </td>

                            <td>
                                @if (!$user->isAdmin())
                                    <form action="{{ route('make-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm float-right">
                                            Make Admin
                                        </button>
                                    </form>
                                @elseif ($user->isAdmin())
                                    <form action="{{ route('remove-admin', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm float-right">
                                            Remove Admin
                                        </button>
                                    </form>
                                @endif
              
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="font-weight-bold">There is no users yet!</p>
                
            @endif
        </div>
@endsection