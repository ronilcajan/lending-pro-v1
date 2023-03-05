<!-- Modal -->
<div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restore Database</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('settings/restore') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="form-group form-floating-label">
                        <label>Upload Sql file</label>
                        <input type="file" class="form-control" accept=".sql" name="backup_file" required>
                    </div>
                    <small class="form-text text-muted">Note: pls upload sql file only.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Restore</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
$query = $this->db->query("SELECT * FROM `info` WHERE 1");
$info = $query->row();
?>
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">System Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('settings/system_update') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Business Name</label>
                                <input type="text" class="form-control" name="bname" required
                                    value="<?= $info->bname ?? null ?>" placeholder="Enter business name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>System Name</label>
                                <input type="text" class="form-control" name="name" required
                                    value="<?= $info->name ?? null ?>" placeholder="Enter system name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-floating-label">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" required
                            value="<?= $info->address ?? null ?>" placeholder="Enter business address">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-floating-label">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" required
                                    value="<?= $info->email ?? null ?>" placeholder="Enter business email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-floating-label">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" name="contact" required
                                    value="<?= $info->contact ?? null ?>" placeholder="Enter business contact number">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-floating-label">
                                <label>Currency</label>
                                <input type="text" class="form-control" name="currency" required
                                    value="<?= $info->currency ?? null ?>" placeholder="Enter currency">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Logo</label>
                                <input type="file" class="form-control" accept="image/*" name="logo">
                                <img src="<?= !empty($info->logo) ?  site_url('assets/uploads/system/').$info->logo : site_url('assets/img/loan-favicon.png') ?>"
                                    width="60" alt="navbar brand" class="navbar-brand border mt-2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-floating-label">
                                <label>Logo 2</label>
                                <input type="file" class="form-control" accept="image/*" name="logo2">
                                <img src="<?= !empty($info->logo2) ?  site_url('assets/uploads/system/').$info->logo2 : site_url('assets/img/loan-logo.png') ?>"
                                    width="60" alt="navbar brand" class="navbar-brand border mt-2">
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>