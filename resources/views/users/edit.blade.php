@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            My profile
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

            <form action="{{ route('update-profile', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" 
                        value="{{ $user->name}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" disabled 
                        value="{{ $user->email}}">
            </div>

            <div class="form-group">
                <label for="about">About me</label>
                <textarea type="text" rows="5" cols="5" class="form-control" name="about" id="about">{{ $user->about}}
                </textarea>
            </div>
            
            <button type="submit" class="button btn btn-success">
                Update Profile
            </button>

            </form>
        </div>
    </div>
@endsection