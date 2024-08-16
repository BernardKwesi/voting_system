<div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editCategoryForm">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="update-category-id">
                <div class="row mt-2">
                    <div class="col">
                        <label for="">Description<span style="color:red">*</span></label>
                        <input type="text" name="description" required class="form-control" id="update-category-name" required>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <label for="">Order<span style="color:red">*</span></label>
                        <input type="number" name="order" required class="form-control" id="update-category-order" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="editCategoryForm" class="btn btn-primary">Save changes</button>

            </div>
        </form>


      </div>
    </div>
  </div>

  <script>
    const editCategoryForm = document.forms["editCategoryForm"];

    $(editCategoryForm).submit(function(e) {
        e.preventDefault();

        var formdata = new FormData(editCategoryForm)
        formdata.append("createuser", CREATEUSER);

        Swal.fire({
            title: '',
            text: "Are you sure you want to update category?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Update'

        }).then((result) => {

            if (result.value) {
                Swal.fire({
                    text: "Updating category...",
                    showConfirmButton: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                fetch(`${APP_URL}/api/categories/update`, {
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
                        text: "Category Updated Successfully",
                        icon: "success"
                    });
                    $("#updateCategoryModal").modal('hide');
                    categoryTable.ajax.reload(false, null);

                    editCategoryForm.reset();

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
