<div class="modal fade" id="addElectionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Election</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addElectionForm">
            @csrf
            <div class="modal-body">
                <div class="row mt-2">
                    <div class="col">
                        <label for="">Name<span style="color:red">*</span></label>
                        <input type="text" name="name"  class="form-control" required>
                    </div>
                </div>



                <div class="row mt-2">
                    <div class="col">
                        <label for="">Elections<span style="color:red">*</span></label>
                       <select name="election" id="" class="form-control ">
                        <option value="">--select--</option>
                           @foreach ($elections as $election)
                               <option value="{{ $election->id }}">{{ $election->name }}</option>
                           @endforeach
                       </select>
                    </div>
                </div>




            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="addElectionForm" class="btn btn-primary">Save changes</button>

            </div>
        </form>


      </div>
    </div>
  </div>

  <script>
    const addElectionForm = document.forms["addElectionForm"];

    $(addElectionForm).submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(addElectionForm)
        formdata.append("createuser", CREATEUSER);

        Swal.fire({
            title: '',
            text: "Are you sure you want to save?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Submit'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Saving...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/positions`, {
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
                        text: "Saved Successfully",
                        icon: "success"
                    });
                    $("#addElectionModal").modal('hide');
                    electionsTable.ajax.reload(false, null);

                    addElectionForm.reset();

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
