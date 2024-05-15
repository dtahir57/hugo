<form action="{{ route('admin.opportunity.assign.users', $opportunity->id) }}" method="POST">
    @csrf
    <div class="modal modal-lg fade" id="assignUserModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="assignUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white dark__text-gray-1100" id="assignUserModalLabel">Assign User</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs-9 text-white dark__text-gray-1100"></span></button>
            </div>
            <div class="modal-body">
                <label for="organizerMultiple">Select Users (Multiple)</label>
                <select class="form-select" name="users[]" required id="organizerMultiple" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                    <option value="">Select Users</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit">Save</button>
                <button class="btn btn-outline-success" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
</form>