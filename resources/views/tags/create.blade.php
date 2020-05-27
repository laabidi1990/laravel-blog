@extends('layouts.app')

@section('content')
    
<div class="card card-default">
    <div class="card-header">
        {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
   
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
    <form action=" {{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
            @csrf
            @if (isset($tag))
                @method('PUT')
            @endif

            <div class="from-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" 
                   value="{{ isset($tag) ? $tag->name : '' }}"> 
            </div>
            <div class="from-group">
                <button class="btn btn-success mt-3">
                    {{ isset($tag) ? 'Edit' : 'create' }}
                </button>
            </div>
        </form>
    </div>
</div>
    
@endsection