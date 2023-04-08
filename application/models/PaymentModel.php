<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentModel extends CI_Model
{

    public function __contruct()
    {
        $this->load->database();
    }

    public function insert_pment($data)
    {
        $this->db->insert('payment', $data);
        return $this->db->affected_rows();
    }

    public function updatePayment($data, $id)
    {
        $this->db->update('payment', $data, "id=$id");
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('loan_id', $id);
        $this->db->delete('payment');
        return $this->db->affected_rows();
    }

    public function insert_transaction($data)
    {
        $this->db->insert('transaction', $data);
        return $this->db->affected_rows();
    }

    public function reports()
    {
        $sql1 = "SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));";
        $this->db->query($sql1);

        $sql = "SELECT *, loan.id as loan_id, SUM(payment.amount) as balance, payment.status as pay_stat
        FROM borrower
        INNER JOIN loan ON loan.borrower_id = borrower.id
        INNER JOIN payment ON loan.id = payment.loan_id
        INNER JOIN borrower_address ON borrower.id = borrower_address.borrower_id
        INNER JOIN guarantor ON borrower.id = guarantor.borrower_id
        WHERE loan.status = 'Active'
        GROUP BY loan.id
        ORDER BY loan.id ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function due_date()
    {
        $this->db->join('loan', 'loan.id=payment.loan_id');
        $this->db->where('payment.status', 'Processing');
        $this->db->group_by('payment.id');
        $query = $this->db->get('payment');
        return $query->result();
    }

    public function getPayment($id)
    {
        $this->db->select('*, payment.id as payment_id, borrower.id as borrowers_id');
        $this->db->from('loan');
        $this->db->join('borrower', 'borrower.id=loan.borrower_id');
        $this->db->join('payment', 'payment.loan_id=loan.id');
        $this->db->where('payment.loan_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPaymentdetails($id)
    {
        $this->db->select('*, payment.id as payment_id, loan.id as loan_id, payment.remarks as remarks');
        $this->db->from('payment');
        $this->db->join('loan', 'loan.id=payment.loan_id');
        $this->db->join('borrower', 'borrower.id=loan.borrower_id');
        $this->db->where('payment.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function getTransactions()
    {
        $this->db->select('*, loan.id as id, transaction.total_amount as total_amount, borrower.id as borrowers_id');
        $this->db->from('transaction');
        $this->db->join('loan', 'loan.id=transaction.loan_id');
        $this->db->join('borrower', 'borrower.id=loan.borrower_id');
        $this->db->join('borrower_address', 'borrower.id=borrower_address.borrower_id');
        $this->db->join('guarantor', 'borrower.id=guarantor.borrower_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getTrans($id)
    {
        $this->db->select('*, loan.id as id, transaction.total_amount as total_amount, borrower.id as borrowers_id');
        $this->db->from('transaction');
        $this->db->join('loan', 'loan.id=transaction.loan_id');
        $this->db->join('borrower', 'borrower.id=loan.borrower_id');
        $this->db->where('transaction.loan_id', $id);
        $this->db->order_by('trans_date', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getTransac($id)
    {
        $this->db->select('*, loan.id as id, transaction.total_amount as total_amount');
        $this->db->from('transaction');
        $this->db->join('loan', 'loan.id=transaction.loan_id');
        $this->db->join('borrower', 'borrower.id=loan.borrower_id');
        $this->db->where('borrower.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}