<?php $user = $this->ion_auth->user()->row(); ?>
<?php $query = $this->db->query("SELECT * FROM `info` WHERE 1"); $info = $query->row(); ?>
<div class="row justify-content-center">

    <div class="col-12 col-lg-10 col-xl-9">

        <div class="row align-items-center">

            <div class="col">

                <h6 class="page-pretitle">

                    Loans

                </h6>

                <h4 class="page-title"><?= $title ?></h4>

            </div>

            <div class="col-auto">

                <a href="javascript:void(0)" class="btn btn-primary ml-2" onclick="printDiv('printThis')">

                    Print

                </a>

            </div>

        </div>

        <div class="page-divider"></div>

        <div class="row">

            <div class="col-md-12">

                <div class="card card-invoice" id="printThis">

                    <div class="card-header">
                        <div class="row" style="margin-bottom:2px;">
                            <div class="col-3 text-center">
                                <img src="<?= !empty($info->name) ? site_url('assets/uploads/system/').$info->logo : site_url('assets/img/loan-favicon.png') ?>"
                                    class="img-fluid" width="80">
                            </div>
                            <div class="col-6 text-center">
                                <h3 class="mb-0" style="line-height:1.2"><?= $info->bname ?></h3>
                                <h5 class="font-bold mb-0 mt-0"><?= $info->address ?></h5>
                                <p class="mt-0 font-12 font-bold">Contact
                                    No.<?= $info->contact ?>/Email:<?= $info->email ?>
                                </p>
                            </div>
                            <div class="col-3 text-center" style="visibility:hidden">
                                <img src="http://localhost/brgy-v2/assets/uploads/a3806eb2b6a8a6a0ac3b8686a22f5f04.png"
                                    class="img-fluid" width="120">
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="invoice-title"><b><?= $title ?></b></h3>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="separator-solid"></div>

                        <div class="">

                            <p>This loan agreement is made and will be effective on

                                <input value="<?= date('m/d/Y', strtotime($loans->date_started)) ?>"
                                    onchange="this.setAttribute('value', this.value)"
                                    class="fw-bold text-center input_print" /> BETWEEN
                            </p>

                            <p>

                                <input
                                    value="<?= ucwords($borrower->firstname. ' '. $borrower->middlename[0].' '.$borrower->lastname)  ?>"
                                    onchange="this.setAttribute('value', this.value)"
                                    class="fw-bold text-center input_print" />

                                hereinafter referred to as the "Borrowers" with a street address of

                                <input
                                    value=" <?= $borrower->address1.' '. $borrower->address2.' '. $borrower->city.' '. $borrower->province.' '. $borrower->zipcode.' '. $borrower->country ?>"
                                    onchange="this.setAttribute('value', this.value)"
                                    class="fw-bold text-center input_print" style="width:100%" />

                            </p>

                            <p>AND</p>

                            <p>

                                <input value="<?= $user->first_name.' '.$user->last_name ?>"
                                    onchange="this.setAttribute('value', this.value)"
                                    class="fw-bold text-center input_print" />

                                hereinafter referred to as the "Lender" with a street address of

                                <input value="<?= $user->address ?>" onchange="this.setAttribute('value', this.value)"
                                    class="fw-bold text-center input_print" style="width:100%" />

                            </p>

                        </div>

                        <div class="mt-5">

                            <p class="mb-0"><b>Terms and Conditions:</b></p>

                            <div class="separator-solid mt-1"></div>

                            <p>Promised to Pay:</p>

                            <p>

                                Within

                                <input value="<?= $loans->terms ?>" onchange="this.setAttribute('value', this.value)"
                                    class="fw-bold text-center input_print" style="width:50px" />

                                <?= $loans->terms2 ?> from today, Borrowers promises to pay the Lender
                                <?= $info->currency ?>

                                <input value="<?= number_format($loans->principal,2) ?>"
                                    onchange="this.setAttribute('value', this.value)"
                                    class="fw-bold text-center input_print" style="width:150px" />
                            </p>

                            <p>
                                and interest as well as other charges owed below.
                            </p>
                            <p><b>Details of Loan: Agreed Between Borrowers and Lender:</b></p>

                            <div class="row">

                                <div class="col-md-4 col-4 text-center">

                                    <p>Amount of Loan:</p>

                                </div>

                                <div class="col-md-8 col-8">

                                    :<?= $info->currency ?> <input value="<?= number_format($loans->principal,2) ?>"
                                        onchange="this.setAttribute('value', this.value)"
                                        class="fw-bold text-center input_print" style="width:250px" />

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 col-4 text-center">

                                    <p>Service Charge:</p>

                                </div>

                                <div class="col-md-8 col-8">

                                    :<?= $info->currency ?> <input onchange="this.setAttribute('value', this.value)"
                                        class="fw-bold text-center input_print" style="width:250px" />

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 col-4 text-center">

                                    <p>Old Balance:</p>

                                </div>

                                <div class="col-md-8 col-8">

                                    :<?= $info->currency ?> <input onchange="this.setAttribute('value', this.value)"
                                        class="fw-bold text-center input_print" style="width:250px" />

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 col-4 text-center">

                                    <p><b>Net Proceeds</b></p>

                                </div>

                                <div class="col-md-8 col-8">

                                    :<?= $info->currency ?> <input value="<?= number_format($loans->principal,2) ?>"
                                        onchange="this.setAttribute('value', this.value)"
                                        class="fw-bold text-center input_print" style="width:250px" />

                                </div>

                            </div>

                            <div class="row mt-5">

                                <div class="col-md-4 col-4 text-center">

                                    <p>Interest rate</p>

                                </div>

                                <div class="col-md-8 col-8">

                                    : <input value="<?= $loans->interest ?>"
                                        onchange="this.setAttribute('value', this.value)"
                                        class="fw-bold text-center input_print" style="width:250px" />

                                    %

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 col-4 text-center">

                                    <p>Amortization</p>

                                </div>

                                <div class="col-md-8 col-8">

                                    :<?= $info->currency ?> <input value="<?= number_format($loans->monthly,2) ?>"
                                        onchange="this.setAttribute('value', this.value)"
                                        class="fw-bold text-center input_print" style="width:250px" />

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 col-4 text-center">

                                    <p>Term</p>

                                </div>

                                <div class="col-md-8 col-8">

                                    : <input value="<?= $loans->terms ?>"
                                        onchange="this.setAttribute('value', this.value)"
                                        class="fw-bold text-center input_print" style="width:250px" />

                                    <?= $loans->terms2 ?>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 col-4 text-center">

                                    <p>Start of Payment</p>

                                </div>

                                <div class="col-md-8 col-8">

                                    :<input value="<?= date('m/d/Y', strtotime($loans->date_started)) ?>"
                                        onchange="this.setAttribute('value', this.value)"
                                        class="fw-bold text-center input_print" style="width:250px" />

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 col-4 text-center">

                                    <p>Maturity Date</p>

                                </div>

                                <div class="col-md-8 col-8">

                                    :<input value="<?= date('m/d/Y', strtotime($loans->maturity_date)) ?>"
                                        onchange="this.setAttribute('value', this.value)"
                                        class="fw-bold text-center input_print" style="width:250px" />

                                </div>

                            </div>

                            <div class="row mt-5">

                                <div class="col-md-6 col-6 text-center">

                                    <p class="mb-0"><input
                                            value="<?= ucwords($borrower->firstname. ' '. $borrower->middlename[0].' '.$borrower->lastname)  ?>"
                                            onchange="this.setAttribute('value', this.value)"
                                            class="fw-bold text-center input_print" style="width:250px" /></p>

                                    <p>Borrower</p>

                                </div>

                                <div class="col-md-6 col-6 text-center">

                                    <p class="mb-0"><input value="<?= $borrower->co_maker ?>"
                                            onchange="this.setAttribute('value', this.value)"
                                            class="fw-bold text-center input_print" style="width:250px" /></p>

                                    <p>Co Maker</p>

                                </div>

                            </div>

                            <div class="row mt-3">

                                <div class="col-md-6 col-6 text-center">

                                    <p class="mb-0"><input value="<?= $user->first_name.' '.$user->last_name ?>"
                                            onchange="this.setAttribute('value', this.value)"
                                            class="fw-bold text-center input_print" style="width:250px" /></p>

                                    <p>Authorize Representative/Lender</p>

                                </div>

                            </div>

                            <div class="card-footer"></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>