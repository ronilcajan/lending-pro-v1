<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Settings extends CI_Controller {

    public function backup(){
		$this->load->dbutil();
        $prefs = array(     
            'format'      => 'zip',             
            'filename'    => 'loanapp.sql',
            'ignore'        => array('users','groups','users_groups','login_attempts'),
        );
        $backup = $this->dbutil->backup($prefs); 
        $db_name = 'loanapp-backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'pathtobkfolder/'.$db_name;
        $this->load->helper('file');
        write_file($save, $backup); 
        $this->load->helper('download');
        force_download($db_name, $backup);
	}



    public function restore(){
        $config['upload_path'] = './assets/backup/';
		$config['allowed_types'] = '*';
		$this->load->library('upload',$config);
        if(!$this->upload->do_upload('backup_file')){
            $this->session->set_flashdata('errors',  $this->upload->display_errors());
        }else{
            $file = $this->upload->data();
            $sql = file_get_contents('./assets/backup/'.$file['file_name']);
            $string_query = rtrim( $sql, '\n;');
            $array_query = explode(';', $sql);
            foreach($array_query as $query){
                $this->db->query($query);
            }
            $this->session->set_flashdata('message', 'Database Restored!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function system_update(){
        $config['upload_path'] = 'assets/uploads/system/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

        $this->load->library('upload');
		$this->upload->initialize($config);
        
		$this->session->set_flashdata('success', 'danger');

		$this->form_validation->set_rules('name','Business name', 'trim|required');
        $this->form_validation->set_rules('email','Business email', 'trim|required');
        
        if ($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('message', validation_errors());

        }else{
            $logo     = $_FILES['logo']['name'];
            $logo1     = $_FILES['logo2']['name'];

            if (!empty($logo) && !empty($logo1)) {

                $this->upload->do_upload('logo');
                $sys_logo = $this->upload->data();
                $this->upload->do_upload('logo2');
                $sys_logo1 = $this->upload->data();

                $data = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'contact' => $this->input->post('contact'),
                    'email' => $this->input->post('email'),
                    'logo' => $sys_logo['file_name'],
                    'logo2' => $sys_logo1['file_name'],
                );
            } else if (!empty($logo) && empty($logo1)) {
                $this->upload->do_upload('logo');
                $sys_logo = $this->upload->data();

                $data = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'contact' => $this->input->post('contact'),
                    'email' => $this->input->post('email'),
                    'logo' => $sys_logo['file_name'],
                );

            } else if (empty($logo) && !empty($logo1)) {
                $this->upload->do_upload('logo2');
                $sys_logo2 = $this->upload->data();

                $data = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'contact' => $this->input->post('contact'),
                    'email' => $this->input->post('email'),
                    'logo2' => $sys_logo2['file_name'],
                );
            }else{
                $data = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'contact' => $this->input->post('contact'),
                    'email' => $this->input->post('email'),
                    'currency' => $this->input->post('currency'),
                );
            }
            $this->session->set_flashdata('success', 'success');
            $this->dashboardModel->update_sys_info($data);
            $this->session->set_flashdata('message', 'Updated successful!');
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
}