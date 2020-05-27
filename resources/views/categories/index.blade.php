@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">
        Add category
    </a>
</div>

<div class="card card-default">
    <div class="card-header">
        Categories
    </div>
    <div class="card-body">
        @if ($categories->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Post Count</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>
                           
                        <td class="pl-5">
                            {{ $category->posts->count() }}
                        </td>

                        <td>
                            <button class="btn btn-danger btn-sm float-right" 
                                onclick="handleDelete({{ $category->id }})">
                                Delete
                            </button>

                            <a href="{{ route('categories.edit', $category->id) }}" 
                                class="btn btn-info btn-sm float-right mr-2">Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="font-weight-bold">There is no categories yet!</p>
        @endif

    <form action="" method="POST" id="deleteCetgoryForm">
          @csrf
          @method('DELETE')

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <h5 class="modal-title bg-dange" id="deleteModalLabel">Delete category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body font-weight-bold">
                  Are you sur you want to delete this category !
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <button type="submit" class="btn btn-warning">Yes</button>
                </div>
              </div>
            </div>
        </div>
      </form>

    </div>
</div>
    
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            // let form = $('#deleteCetgoryForm');
            let form = document.getElementById('deleteCetgoryForm');
            form.action = '/categories/' + id;
            console.log(form);
            
            $('#deleteModal').modal('show');
        }
    </script>
    
@endsection
