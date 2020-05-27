@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">
            Add post
        </a>
    </div>

    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>

        <div class="card-body">
            @if ($posts->count() > 0)
                <table class="table">
                    <thead>
                        <th>Image</th>
                        <th>title</th>
                        <th>Category</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$post->image) }}" alt="post-image" 
                                      width="120" height="90">
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>

                            <td>
                            <a href="{{ route('categories.edit', $post->category->id) }}"> 
                                {{ $post->category->name }}
                            </a>
                            </td>
                            <td>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm float-right ml-2">
                                        {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                    </button>
                                </form>
                                @if ($post->trashed())
                                    <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-infos btn-sm float-right ml-2">
                                            Restore
                                        </button>
                                    </form>
                                @else 
                                    <a href="{{ route('posts.edit', $post->id) }}" 
                                        class="btn btn-info btn-sm float-right mt-2">Edit</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="font-weight-bold">There is no records!</p>
                
            @endif
        </div>
@endsection