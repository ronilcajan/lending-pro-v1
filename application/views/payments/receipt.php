<?php
$query = $this->db->query("SELECT * FROM `info` WHERE 1");
$info = $query->row();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt example</title>
    <style>
    * {
        font-size: 12px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.description,
    th.description {
        width: 75px;
        max-width: 75px;
    }

    td.quantity,
    th.quantity {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    td.price,
    th.price {
        width: 40px;
        max-width: 40px;
        word-break: break-all;
    }

    .centered {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 155px;
        max-width: 155px;
    }

    img {
        max-width: inherit;
        width: inherit;
    }

    @media print {

        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }
    </style>
</head>

<body>
    <div class="ticket">
        <img src="<?= !empty($info->logo2) ? site_url('assets/uploads/system/').$info->logo2 : site_url('assets/img/loan-logo.png') ?>"
            alt="Logo">
        <p class="centered">RECEIPT No: <?= $loan->payment_id ?>
            <br><?= $info->address ?>
            <br><?= $info->contact ?>
            <br><?= $info->email ?>
        </p>
        <table>
            <tbody>
                <tr>
                    <td class="quantity" colspan="2">Name:
                        <?= ucwords($loan->firstname. ' '. $loan->middlename[0].'. '.$loan->lastname)  ?></td>
                </tr>
                <tr>
                    <td class="description">Loan ID:</td>
                    <td class="description">L0<?= $loan->loan_id  ?></td>
                </tr>
                <tr>
                    <td class="price">Due Date:</td>
                    <td class="description"><?= date('M. d, Y', strtotime($loan->due_date))  ?></td>
                </tr>
                <tr>
                    <td class="price">Date Paid:</td>
                    <td class="description"><?= date('M. d, Y', strtotime($loan->date)) ?></td>
                </tr>
                <tr>
                    <td class="price"></td>
                    <td class="description"></td>
                </tr>
                <tr>
                    <td class="price">Amount Due:</td>
                    <td class="description"><?= $info->currency  ?>
                        <?=  !empty($loan->due) ? number_format($loan->due+$loan->p_interest,2) : '0,00'  ?></td>
                </tr>
                <tr>
                    <td class="price">Amount Paid:</td>
                    <td class="description"><?= $info->currency  ?>
                        <?=  !empty($loan->amount) ? number_format($loan->amount,2) : '0,00'  ?></td>
                </tr>
                <tr>
                    <td class="price">Penalties:</td>
                    <td class="description"><?= $info->currency  ?>
                        <?= !empty($loan->p_penalty) ? number_format($loan->p_penalty,2).' ('.$loan->penalty.'%)' : '0.00'  ?>
                    </td>
                </tr>
                <tr>
                    <td class="price"></td>
                    <td class="description"></td>
                </tr>
                <tr>
                    <td class="price">Total Paid:</td>
                    <td class="description"><?= $info->currency  ?>
                        <?= !empty($loan->amount) ? number_format($loan->amount,2) : '0.00' ?></td>
                </tr>
                <tr>
                    <td class="price">Loan Balance:</td>
                    <td class="description">
                        <?= $loan->balance == 0 ? 'Fully Paid' :  $info->currency.' '.number_format($loan->balance,2) ?>
                    </td>
                </tr>
                <tr>
                    <td class="price" colspan="2">Notes/comments: <?= $loan->remarks  ?></td>
                </tr>
            </tbody>
        </table>
        <p class="centered">Thanks you!
            <br>softwarezen.com
        </p>
    </div>
    <script>
    window.print();
    setTimeout(window.close, 2000);
    </script>
</body>

</html>