<?php $query = $this->db->query("SELECT * FROM `info` WHERE 1"); $info = $query->row(); ?>

<div class="page-header">
    <h4 class="page-title"><?= $title ?></h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="fas fa-exchange-alt"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">Transactions</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="transactionTable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Loan ID</th>
                                <th>Name</th>
                                <th>Total Amount</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Loan ID</th>
                                <th>Name</th>
                                <th>Total Amount</th>
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
                                <td><a
                                        href="<?= site_url('borrowers_profile/').$row['borrowers_id'] ?>"><?=$row['firstname'].' '.$row['middlename'].' '.$row['lastname']?></a>
                                </td>
                                <td><?= $info->currency.' '.number_format($row['total_amount'], 2) ?></td>
                                <td><?= $row['username'] ?></td>
                                <td> <a type="button" href="<?= site_url("payments/receipt/" . $row['payment_id']); ?>"
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

<?php $this->load->view('payments/modal') ?>