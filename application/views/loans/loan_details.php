<?php
$user = $this->ion_auth->user()->row();
$gro = $this->ion_auth->get_users_groups()->row();
$query = $this->db->query("SELECT * FROM `info` WHERE 1");
$info = $query->row();
?>
<div class="page-header">
    <h4 class="page-title"><?= $title ?></h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="icon-wallet"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">Loans</a>
        </li>
    </ul>
    <div class="col-auto">
        <a href="javascript:void(0)" class="btn btn-primary ml-2" onclick="printDiv('printThis')">
            Print
        </a>
    </div>
</div>

<div id="printThis">
    <div class="row">
        <div class="col-md-5">
            <div class="card card-profile">
                <div class="card-header" style="background-image: url('<?= site_url() ?>/assets/img/blogpost.jpg')">
                    <div class="profile-picture">
                        <div class="avatar avatar-xl">
                            <?php if (empty($borrower->avatar)) : ?>
                            <img class="avatar-img rounded-circle" alt="preview"
                                src="<?= site_url() ?>assets/img/person.png" />
                            <?php else : ?>
                            <img class="avatar-img rounded-circle" alt="preview"
                                src="<?= preg_match('/data:image/i', $borrower->avatar) ? $borrower->avatar : site_url() . 'assets/uploads/avatar/' . $user->avatar ?>" />
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name"><?= $borrower->firstname.' '.$borrower->middlename.' '.$borrower->lastname ?>
                        </div>
                    </div>
                    <div>
                        Gender: <?= $borrower->gender ?>
                    </div>
                    <div>
                        Birthdate: <?= date('F d, Y',strtotime($borrower->birthdate)) ?>
                    </div>
                    <div>
                        Contact No.: <a href="tel:<?= $borrower->contact ?>"><?= $borrower->contact ?></a>
                    </div>
                    <div>
                        Address:
                        <?= $borrower->address1.' '. $borrower->address2.' '. $borrower->city.' '. $borrower->province.' '. $borrower->zipcode.' '. $borrower->country ?>
                    </div>
                    <hr>
                    <div>
                        Occupation: <?= $borrower->occupation ?>
                    </div>
                    <div>
                        Address: <?= $borrower->occupation_address ?>
                    </div>
                    <hr>
                    <div>
                        <b>GUARANTOR</b>
                    </div>
                    <div>
                        Name: <?= $borrower->guarantor_name ?>
                    </div>
                    <div>
                        Address: <?= $borrower->guarantor_address ?>
                    </div>
                    <div>
                        Email: <?= $borrower->guarantor_email ?>
                    </div>
                    <div>
                        Contact: <?= $borrower->guarantor_contacts ?>
                    </div>
                    <div>
                        Occupation: <?= $borrower->guarantor_occupation ?>
                    </div>
                    <div>
                        Occupation Address: <?= $borrower->guarantor_occupation_address ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 clas="card-title">Loan Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="w-100">
                                <tr>
                                    <td>Status:</td>
                                    <td> <?= $borrower->status == 'Active' ? '<span class="badge badge-primary badge-pill mt-2">Active</span>' : '<span class="badge badge-success badge-pill">Paid</span>' ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Loan ID:</td>
                                    <td>L0<?= $borrower->id ?></td>
                                </tr>

                                <tr>
                                    <td>Principal:</td>
                                    <td> <?= number_format($borrower->principal, 2) ?></td>
                                </tr>
                                <tr>
                                    <td>Loan Type:</td>
                                    <td><?= $borrower->loan_type ?></td>
                                </tr>
                                <tr>
                                    <td>Interest:</td>
                                    <td><?= $borrower->interest ?> %</td>
                                </tr>
                                <tr>
                                    <td>Terms:</td>
                                    <td><?= $borrower->terms ?> <?= $borrower->terms2 ?></td>
                                </tr>
                                <tr>
                                    <td>Penalty:</td>
                                    <td><?= $borrower->penalty ?> %</td>
                                </tr>
                                <tr>
                                    <td>Date Started:</td>
                                    <td><?= date('m/d/Y', strtotime($borrower->date_started)) ?></td>
                                </tr>
                                <tr>
                                    <td>Maturity Date:</td>
                                    <td><?= date('m/d/Y', strtotime($borrower->maturity_date)) ?></td>
                                </tr>
                                <tr>
                                    <td>Payment:</td>
                                    <td><?= $info->currency ?> <?= number_format($borrower->monthly, 2) ?></td>
                                </tr>
                                <tr>
                                    <td>Total Amount:</td>
                                    <td><?= $info->currency ?> <?= number_format($borrower->total_amount, 2) ?></td>
                                </tr>
                                <tr>
                                    <td>Notes:</td>
                                    <td><?= $borrower->notes ?></td>
                                </tr>
                                <tr>
                                    <td>Co Maker:</td>
                                    <td><?= $borrower->co_maker ?></td>
                                </tr>
                                <tr>
                                    <td>Co Maker:</td>
                                    <td><?= $borrower->co_maker2 ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 clas="card-title">Payment Table</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Due</th>
                            <th>Interest</th>
                            <th>Penalty</th>
                            <th>To Pay</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($loans)) : ?>
                        <?php
                        $i = 1;
                        $total = 0;
                        foreach ($loans as $row) : 
                    ?>
                        <tr>
                            <td><?= date('F', strtotime($row['due_date'])) ?></td>
                            <td><?= empty($row['due']) ? null : $info->currency. ' '.number_format($row['due'], 2) ?>
                            </td>
                            <td><?= empty($row['p_interest']) ? null : $info->currency.' '.number_format($row['p_interest'], 2) ?>
                            </td>
                            <td><?= empty($row['p_penalty']) ? null : $info->currency. ' '.number_format($row['p_penalty'], 2) ?>
                            </td>
                            <td><?= empty($row['due']) ? null : $info->currency.' '.number_format(($row['due'] + $row['p_interest'] + $row['p_penalty']), 2) ?>
                            </td>
                            <td> <?= $row['status'] == 'Paid' ? '<span class="badge badge-success badge-pill">Paid</span>' : '<span class="badge badge-primary badge-pill">' . $row['status'] . '</span>' ?>
                            </td>
                            <td><?= $row['remarks'] ?></td>
                            <td><?= empty($row['amount']) ? null : $info->currency.' '.number_format($row['amount'], 2) ?>
                            </td>
                            <td><?= empty($row['date']) ? null : date('m/d/Y', strtotime($row['date'])) ?></td>
                            <td>
                                <?php if ($row['status'] == 'Processing') : ?>
                                <a type="button" href="#pay" data-toggle="modal"
                                    class="btn btn-link btn-primary pl-1 pr-1" title="Pay Monthly Loan"
                                    data-id="<?= $row['payment_id'] ?>"
                                    data-amount="<?= empty($row['due']) ? null : $row['due'] + $row['p_interest'] + $row['p_penalty'] ?>"
                                    data-terms="<?= $i ?>" data-terms2="<?= $borrower->terms2 ?>"
                                    data-loan_id="<?= $borrower->id ?>"
                                    data-skip="<?= $i == $borrower->terms ? 'hide' : 'show' ?>"
                                    data-payment="<?= $row['p_interest'] + $row['p_penalty'] ?>"
                                    onclick="payLoan(this)">
                                    <i class="icon-wallet"></i>
                                </a>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php
                            $i++;
                            $total += $row['amount'];
                        endforeach; ?>
                        <?php endif ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6"></th>
                            <th>Total(P):</th>
                            <th><?= $info->currency.' '.number_format($total, 2) ?></th>
                        </tr>
                    </tfoot>
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
                <table class="display table table-striped table-hover">
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
                        <?php if (!empty($trans)) : ?>
                        <?php foreach ($trans as $row) : ?>
                        <tr>
                            <td><?= date('m/d/Y', strtotime($row['trans_date'])) ?></td>
                            <td> <?= $info->currency.' '.number_format($row['total_amount'], 2) ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><a type="button" href="<?= site_url("payments/receipt/" . $row['payment_id']); ?>"
                                    target="_blank" data-toggle="tooltip" class="btn btn-link btn-danger pl-1 pr-1"
                                    data-original-title="Print Receipt">
                                    <i class="fas fa-print"></i>
                                </a></td>
                        </tr>

                        <?php endforeach; ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('payments/modal') ?>