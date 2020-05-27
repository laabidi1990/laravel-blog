@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
    <a href="{{ route('tags.create') }}" class="btn btn-success mb-3">
        Add Tag
    </a>
</div>

<div class="card card-default">
    <div class="card-header">
        Tags
    </div>
    <div class="card-body">
        @if ($tags->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Post Count</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->name }}
                        </td>
                           
                        <td class="pl-5">
                            {{ $tag->posts->count() }}
                        </td>

                        <td>
                            <button class="btn btn-danger btn-sm float-right" 
                                onclick="handleDelete({{ $tag->id }})">
                                Delete
                            </button>

                            <a href="{{ route('tags.edit', $tag->id) }}" 
                                class="btn btn-info btn-sm float-right mr-2">Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="font-weight-bold">There is no tags yet!</p>
        @endif

    <form action="" method="POST" id="deleteTagForm">
          @csrf
          @method('DELETE')

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-warning">
                  <h5 class="modal-title bg-dange" id="deleteModalLabel">Delete tag</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body font-weight-bold">
                  Are you sur you want to delete this tag !
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
            // let form = $('#deleteTagForm');
            let form = document.getElementById('deleteTagForm');
            form.action = '/tags/' + id;
            console.log(form);
            
            $('#deleteModal').modal('show');
        }
    </script>
    
@endsection
