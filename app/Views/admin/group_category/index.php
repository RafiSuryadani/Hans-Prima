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
                    <button type="button" class="btn btn-primary block" id="add-btn" data-bs-toggle="modal"
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
                        <th width="15%" align="center">Action</th>
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
                <h4 class="modal-title" id="actionModalLabel">Kelompok Kategori </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="dataForm">
                <div class="modal-body">
                    <div id="form-section">
                        <label for="group_name">Nama Kelompok Kategori *</label>
                        <div class="form-group">
                            <input type="hidden" id="recordId">

                            <input id="group_name" name="group_name" type="text" placeholder="Kelompok Kategori" class="form-control"
                                required onfocus="true"
                                autocomplete="off">
                        </div>

                        <input type="hidden" id="user_id" name="user_id" value="1">

                        <div id="modalResponseMessage" class="mt-3"></div>
                    </div>

                    <div id="delete-section" class="d-none">
                        <p>Apakah Anda yakin ingin menghapus data ini?</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ms-1" form="dataForm" id="submitBtn">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        Save
                    </button>
                    <button type="button" class="btn btn-danger d-none" id="confirmDeleteBtn">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL -->

<?= $this->endSection(); ?>

<?= $this->section('script') ?>

<script>
    const BASE_URL = "<?= base_url('api/group-categories'); ?>";
</script>
<script src="<?= base_url() ?>assets/js/group_category_script.js"></script>

<?= $this->endSection() ?>