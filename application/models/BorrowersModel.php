<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BorrowersModel extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function borrowers(){
        $this->db->select('*, borrower.id as id');
        $this->db->join('borrower_address', 'borrower.id=borrower_address.borrower_id');
        $this->db->join('guarantor', 'borrower.id=guarantor.borrower_id');
        $query = $this->db->get('borrower');
        return $query->result();
    }

    public function getborrowers($id){
        $this->db->select('*, borrower.id as id');
        $this->db->join('borrower_address', 'borrower.id=borrower_address.borrower_id');
        $this->db->join('guarantor', 'borrower.id=guarantor.borrower_id');
        $this->db->where('id', $id);
        $query = $this->db->get('borrower');
        return $query->row();
    }
    public function getfiles($id){
        $this->db->select('*, attachments.id as id');
        $this->db->join('borrower', 'borrower.id=attachments.borrower_id');
        $this->db->where('borrower.id', $id);
        $query = $this->db->get('attachments');
        return $query->result();
    }

    public function borrower($id){
        $this->db->select('*, borrower.id as id');
        $this->db->join('borrower_address', 'borrower.id=borrower_address.borrower_id');
        $this->db->join('guarantor', 'borrower.id=guarantor.borrower_id');
        $this->db->where('borrower.id', $id);
        $query = $this->db->get('borrower');
        return $query->row();
    }
 
    public function getloans($id){
        $this->db->select('*, loan.id as id, borrower.id as borrowers_id');
        $this->db->from('loan');
        $this->db->join('borrower', 'borrower.id=loan.borrower_id');
        $this->db->where('borrower.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add($data){
        $this->db->insert('borrower',$data);
        return $this->db->insert_id();
    }

    public function addAttachments($id, $image){

        return $this->db->insert_batch('attachments', $image);
    }  

    public function addAddress($data){
        $this->db->insert('borrower_address',$data);
        return $this->db->affected_rows();
    }

    public function addGuarantor($data){
        $this->db->insert('guarantor',$data);
        return $this->db->affected_rows();
    }

    public function updateAddress($data,$id){
        $this->db->update('borrower_address' ,$data, "borrower_id='$id'");
        return $this->db->affected_rows();
    }
    public function updateGuarantor($data,$id){
        $this->db->update('guarantor' ,$data, "borrower_id='$id'");
        return $this->db->affected_rows();
    }

    public function update($data,$id){
        $this->db->update('borrower' ,$data, "id='$id'");
        return $this->db->affected_rows();
    }

    public function attachment_delete($id){
        $this->db->where('id', $id);
        $this->db->delete('attachments');
        return $this->db->affected_rows();
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('borrower');
        return $this->db->affected_rows();
    }
}