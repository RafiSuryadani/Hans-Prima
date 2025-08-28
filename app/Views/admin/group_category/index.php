<?= $this->extend('admin/_layouts/master') ?>

<?= $this->section('header') ?>

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="section">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h5 class="card-title">
                    Kelompok Kategori
                </h5>
                <div class="buttons mt-4">
                    <button type="button" class="btn btn-primary block" data-bs-toggle="modal"
                        data-bs-target="#addCategoryModal">
                        <i class="bi bi-plus"></i> Tambah Data
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table_group">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- LOAD ON JAVASCRIPT -->
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- MODAL -->
<div class="modal fade text-left" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="addGroupCategoryForm">
                <div class="modal-body">
                    <label for="group_name">Nama Kelompok Kategori *</label>
                    <div class="form-group">
                        <input id="group_name" type="text" placeholder="Kelompok Kategori" class="form-control"
                            required onfocus="true">
                    </div>

                    <input type="hidden" id="user_id" name="user_id" value="1">

                    <div id="modalResponseMessage" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ms-1" form="addGroupCategoryForm" id="submitButton">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->

<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<script>
    $(document).ready(function() {
        const submitButton = $('#submitButton');

        submitButton.on('click', function(e) {
            e.preventDefault();


            const apiUrl = "<?php echo base_url('api/group-categories'); ?>";
            const postData = {
                group_name: $('#group_name').val(),
                user_id: $('#user_id').val()
            };

            const spinner = submitButton.find('.spinner-border');

            $.ajax({
                url: apiUrl,
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(postData),
                beforeSend: function() {
                    submitButton.prop('disabled', true);
                    spinner.removeClass('d-none');
                    $('#modalResponseMessage').html('');
                },
                success: function(response) {
                    const successMsg = `
                            <div class="alert alert-success" role="alert">
                                <small>${response.messages.success}</small>
                            </div>
                        `;
                    $('#modalResponseMessage').html(successMsg);
                    $('#addGroupCategoryForm')[0].reset();

                    setTimeout(() => {
                        $('#addCategoryModal').modal('hide');
                        $('#addGroupCategoryForm')[0].reset();
                        $('#modalResponseMessage').html('');
                    }, 200);
                },
                error: function(jqXHR) {
                    let errorMessages = '<ul class="mb-0">';
                    const errors = jqXHR.responseJSON;
                    if (typeof errors === 'object') {
                        errorMessages += `<li><small>${errors.messages.group_name}</small></li>`;
                    } else {
                        errorMessages += `<li><small>Terjadi kesalahan.</small></li>`;
                    }
                    errorMessages += '</ul>';

                    const errorMsgHtml =
                        `<div class="alert alert-danger">${errorMessages}</div>`;
                    $('#modalResponseMessage').html(errorMsgHtml);
                },
                complete: function() {
                    submitButton.prop('disabled', false);
                    spinner.addClass('d-none');
                }
            });
        });

        // $('#addCategoryModal').on('hidden.bs.modal', function(event) {
        //     $('#addGroupCategoryForm')[0].reset();
        //     $('#modalResponseMessage').html('');
        // });

        ambilData()
    });

    function ambilData() {
        const apiUrl = "<?php echo base_url('api/group-categories'); ?>";

        $.ajax({
            url: apiUrl,
            method: 'GET',
            contentType: 'application/json',
            success: function(response) {

                console.log(response)
            },
            error: function(jqXHR) {
                console.log("Error")
            }
        });
    }
</script>

<?= $this->endSection() ?>