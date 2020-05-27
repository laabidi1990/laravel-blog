@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit post' : 'Create post' }}
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list group-items">
                            {{ $error }}
                        </li>                    
                    @endforeach
                </ul>
            </div>
         @endif 
        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" 
              method="POST" enctype="multipart/form-data">
            @csrf

            @if (isset($post))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" 
                       value="{{ isset($post) ? $post->title : '' }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control" 
                       value="{{ isset($post) ? $post->description : '' }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" 
                       value="{{ isset($post) ? $post->content : '' }}">
                <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-group">
                <label for="published_at">Published_at</label>
                <input type="text" id="published_at" name="published_at" class="form-control" 
                       value="{{ isset($post) ? $post->published_at : '' }}">
            </div>

            @if (isset($post))
                <div class="form-group">
                    <img src="{{ asset('storage/'.$post->image) }}" alt="post-image" width="400" height="300">
                </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if (isset($post))
                                @if ($category->id === $post->category_id)
                                    selected
                                 @endif
                            @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if ($tags->count() > 0)
                <div class="form-group">
                    <label for="tags">Tag</label>
                    <select name="tags[]" id="tags" class="form-control" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                            @if (isset($post))
                                @if (in_array($tag->id, $post->tags->pluck('id')->toArray()))
                                    selected                                    
                                @endif
                            @endif    
                            >
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success mt-3 w-75">
                    {{ isset($post) ? 'Edit post' : 'Create post' }}
                </button>
            </div>
    
        </form>
    </div>
 
</div>
    
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds: true,
        })

        $(document).ready(function() {
            $('#tags').select2();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


@endsection



