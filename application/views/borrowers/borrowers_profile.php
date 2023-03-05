<?php
$user = $this->ion_auth->user()->row();
$gro = $this->ion_auth->get_users_groups()->row();
?>
<div class="page-header">
    <h4 class="page-title"><?= $title ?></h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="icon-people"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">Borrowers</a>
        </li>
    </ul>
    <div class="col-auto">
        <a href="javascript:void(0)" class="btn btn-primary ml-2" onclick="printDiv('printThis')">
            Print
        </a>
    </div>
</div>
<div class="row" id="printThis">
    <div class="col-md-3">
        <div class="card card-profile">
            <div class="card-header" style="background-image: url('<?= site_url() ?>/assets/img/blogpost.jpg')">
                <div class="profile-picture">
                    <div class="avatar avatar-xl">
                        <?php if(empty($profile->avatar)): ?>
                        <img class="avatar-img rounded-circle" alt="preview"
                            src="<?= site_url() ?>assets/img/person.png" />
                        <?php else: ?>
                        <img class="avatar-img rounded-circle" alt="preview"
                            src="<?= preg_match('/data:image/i', $profile->avatar) ? $profile->avatar : site_url().'assets/uploads/borrowers/'.$profile->avatar ?>" />
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="user-profile text-center">
                    <div class="name"><?= $profile->firstname.' '.$profile->middlename.' '.$profile->lastname ?></div>
                </div>
                <div>
                    Gender: <?= $profile->gender ?>
                </div>
                <div>
                    Birthdate: <?= date('F d, Y',strtotime($profile->birthdate)) ?>
                </div>
                <div>
                    Contact No.: <a href="tel:<?= $profile->contact ?>"><?= $profile->contact ?></a>
                </div>
                <div>
                    Address:
                    <?= $profile->address1.' '. $profile->address2.' '. $profile->city.' '. $profile->province.' '. $profile->zipcode.' '. $profile->country ?>
                </div>
                <hr>
                <div>
                    Occupation: <?= $profile->occupation ?>
                </div>
                <div>
                    Address: <?= $profile->occupation_address ?>
                </div>
                <hr>
                <div>
                    <b>GUARANTOR</b>
                </div>
                <div>
                    Name: <?= $profile->guarantor_name ?>
                </div>
                <div>
                    Address: <?= $profile->guarantor_address ?>
                </div>
                <div>
                    Email: <?= $profile->guarantor_email ?>
                </div>
                <div>
                    Contact: <?= $profile->guarantor_contacts ?>
                </div>
                <div>
                    Occupation: <?= $profile->guarantor_occupation ?>
                </div>
                <div>
                    Occupation Address: <?= $profile->guarantor_occupation_address ?>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Attachments</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-s,">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Files</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; if(!empty($files)): ?>
                            <?php foreach ($files as $row):?>
                            <tr>
                                <td><?= $i ?></td>
                                <td>
                                    <a type="button" href="<?= site_url('assets/uploads/borrowers/').$row->file ?>"
                                        data-toggle="tooltip" class="btn btn-link btn-danger pl-1 pr-1"
                                        data-original-title="View" target="_blank">
                                        <i class="fa fa-file"></i>
                                </td>
                                <td>
                                    <a type="button" href="<?= site_url("borrowers/attachment_delete/").$row->id ?>"
                                        data-toggle="tooltip"
                                        onclick="return confirm('Are you sure you want to delete this attachment?');"
                                        class="btn btn-link btn-danger pl-1 pr-1" data-original-title="Remove">

                                        <i class="fa fa-times"></i>

                                </td>
                            </tr>

                            <?php $i++; endforeach;?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h3 clas="card-title">Borrowers Loan</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="bloanTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Loan ID</th>
                                <th>Loan</th>
                                <th>Started</th>
                                <th>Maturity</th>
                                <th>Monthly</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Loan ID</th>
                                <th>Loan</th>
                                <th>Started</th>
                                <th>Maturity</th>
                                <th>Monthly</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(!empty($loans)): ?>
                            <?php foreach ($loans as $row):?>
                            <tr>
                                <td><a href="<?= site_url('loan_details/').$row['id'] ?>">L0<?= $row['id'] ?></a></td>
                                <td><?= $row['principal'] ?></td>
                                <td><?= date('m/d/Y', strtotime($row['date_started'])) ?></td>
                                <td><?= date('m/d/Y', strtotime($row['maturity_date'])) ?></td>
                                <td>P <?=  number_format($row['monthly'], 2) ?></td>
                                <td>
                                    <?= $row['status']=='Active' ? '<span class="badge badge-primary badge-pill">Active</span>' : '<span class="badge badge-success badge-pill">Paid</span>' ?>
                                </td>
                            </tr>

                            <?php endforeach;?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 clas="card-title">Transaction History</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="btransTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(!empty($transac)): ?>
                            <?php foreach ($transac as $row):?>
                            <tr>
                                <td><?= date('m/d/Y', strtotime($row['trans_date'])) ?></td>
                                <td><a href="<?= site_url('loan_details/').$row['id'] ?>">L0<?= $row['id'] ?></a></td>
                                <td>P <?= number_format($row['total_amount'], 2) ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><a type="button" href="<?= site_url("payments/receipt/" . $row['payment_id']); ?>"
                                        target="_blank" data-toggle="tooltip" class="btn btn-link btn-danger pl-1 pr-1"
                                        data-original-title="Print Receipt">
                                        <i class="fas fa-print"></i>
                                    </a></td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //$this->load->view('payments/modal') ?>