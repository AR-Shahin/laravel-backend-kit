
@foreach ($permissions as $permission)
<!-- Add Modal -->
<div class="modal fade" id="editModal_{{ $permission->id }}" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Edit Permission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.permission.update',$permission->id) }}" method="POST" class="needs-validation">
                @csrf
            <div class="row">
                <div class="col mb-3">
                  <label for="name" class="form-label">Name</label> <span class="text-danger"> *</span>
                  <input type="text" name="name" id="name" class="form-control" placeholder="DashboardController@index" required value="{{ $permission->name }}">
                  <div class="invalid-tooltip">Please choose a unique and valid permission name.</div>
                </div>
              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="display_name" class="form-label">Display Name</label><span class="text-danger"> *</span>
                  <input type="text" name="display_name" id="display_name" class="form-control" placeholder="View Dashboard" required value="{{ $permission->display_name }}">
                  <div class="invalid-tooltip">Please choose a unique and valid display name.</div>
                </div>
                <div class="col mb-0">
                  <label for="description" class="form-label">Description</label><span class="text-danger"> *</span>
                  <input type="text" name="description" id="description" class="form-control" placeholder="Dashboard" required value="{{ $permission->description }}">
                  <div class="invalid-tooltip">Please choose a description for this permission.</div>
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
      </div>
    </div>
  </div>

@endforeach
