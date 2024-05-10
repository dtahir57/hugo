<form action="{{ route('admin.opportunity.delete', $opportunity->id) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE" />
    <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white dark__text-gray-1100" id="staticBackdropLabel">Delete Opportunity</h5>
                <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs-9 text-white dark__text-gray-1100"></span></button>
            </div>
            <div class="modal-body">
                <p class="text-body-tertiary lh-lg mb-0">Are you sure you want to delete this opportunity?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Delete</button>
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
</form>