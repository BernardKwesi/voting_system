<div class="modal fade" id="updateElectionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Election</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editElectionForm">
            @csrf
            <input type="hidden" name="id" id="edit-election-id">
            <div class="modal-body">
                <div class="row mt-2">
                    <div class="col">
                        <label for="">Name<span style="color:red">*</span></label>
                        <input type="text" name="name"  class="form-control" required id="edit-election-name">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <label for="">Start Date -Time<span style="color:red">*</span></label>
                        <input type="datetime-local" name="start" class="form-control" required id="edit-election-start">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <label for="">End Date -Time<span style="color:red">*</span></label>
                        <input type="datetime-local" name="end" class="form-control" required id="edit-election-end">
                    </div>
                </div>


                <div class="row mt-2">
                    <div class="col">
                        <label for="">Status<span style="color:red">*</span></label>
                       <select name="status" class="form-control " id="edit-election-status" required>
                        <option value="">--select--</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                       </select>
                    </div>
                </div>




            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="editElectionForm" class="btn btn-primary">Save changes</button>

            </div>
        </form>


      </div>
    </div>
  </div>

  <script>
    const editElectionForm = document.forms["editElectionForm"];

    $(editElectionForm).submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(editElectionForm)
        formdata.append("createuser", CREATEUSER);

        Swal.fire({
            title: '',
            text: "Are you sure you want to update ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Update'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Updating ...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/elections/update`, {
                    method: "POST",
                    body: formdata,
                }).then(function(res) {
                    return res.json()
                }).then(function(data) {
                    if (!data.ok) {
                        Swal.fire({
                            text: data.msg,
                            icon: "error"
                        });
                        return;
                    }

                    Swal.fire({
                        text: " Updated Successfully",
                        icon: "success"
                    });
                    $("#updateElectionModal").modal('hide');
                    electionsTable.ajax.reload(false, null);

                    editElectionForm.reset();

                }).catch(function(err) {
                console.log(err)
                    if (err) {
                        console.log(err)
                        Swal.fire({
                            icon: "error",
                            text: "Oops! An error occured while adding record, please contact admin ):"
                        });
                    }
                })
            }
        })
    });

</script>
