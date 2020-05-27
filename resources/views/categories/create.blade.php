@extends('layouts.app')

@section('content')
    
<div class="card card-default">
    <div class="card-header">
        {{ isset($category) ? 'Edit category' : 'Create Category' }}
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
    <form action=" {{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" 
            method="POST">
            @csrf
            @if (isset($category))
                @method('PUT')
            @endif

            <div class="from-group">
                <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" 
                   value="{{ isset($category) ? $category->name : '' }}"> 
            </div>
            <div class="from-group">
                <button class="btn btn-success mt-3">
                    {{ isset($category) ? 'Validate' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
</div>
    
@endsection