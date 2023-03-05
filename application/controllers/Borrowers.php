<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowers extends CI_Controller {

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data['title'] = 'Borrowers Management';
		$data['borrowers'] = $this->borrowersModel->borrowers();

		$this->base->load('default', 'borrowers/manage', $data);
	}

	public function create()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data['title'] = 'Create Borrowers Profile';

		$this->base->load('default', 'borrowers/create_borrowers', $data);
	}

	public function store()
	{
		$config['upload_path'] = 'assets/uploads/borrowers/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload');
		$this->upload->initialize($config);

		$this->session->set_flashdata('success', 'danger');

		$this->form_validation->set_rules('firstname','Name', 'trim|required');

        if ($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('message', validation_errors());

        }else{

            if(!$this->upload->do_upload('avatar')){
				$borrower = array(
					'firstname' => $this->input->post('firstname'),
					'middlename' => $this->input->post('middlename'),
					'lastname' => $this->input->post('lastname'),
					'gender' => $this->input->post('gender'),
					'birthdate' => $this->input->post('birthdate'),
					'contact' => $this->input->post('contact'),
					'occupation' => $this->input->post('occupation'),
					'occupation_address' => $this->input->post('occupation_address'),
					'remarks' => $this->input->post('remarks'),
				);
    
            }else{
    
                $file = $this->upload->data();
                $borrower = array(
					'firstname' => $this->input->post('firstname'),
					'middlename' => $this->input->post('middlename'),
					'lastname' => $this->input->post('lastname'),
					'gender' => $this->input->post('gender'),
					'birthdate' => $this->input->post('birthdate'),
					'contact' => $this->input->post('contact'),
					'occupation' => $this->input->post('occupation'),
					'occupation_address' => $this->input->post('occupation_address'),
					'remarks' => $this->input->post('remarks'),
					'avatar' => $file['file_name'],
				);
            }

            $inserted_id =  $this->borrowersModel->add($borrower);
    
            if($inserted_id){
				
				$files = $_FILES;
				$countFiles = count($_FILES['attachedfile']['name']);
				$uploadImgData = array();

				if(!empty($files['attachedfile']['name'][0])){
					for($i=0; $i < $countFiles; $i++){           
						$_FILES['attachedfile']['name']= $files['attachedfile']['name'][$i];
						$_FILES['attachedfile']['type']= $files['attachedfile']['type'][$i];
						$_FILES['attachedfile']['tmp_name']= $files['attachedfile']['tmp_name'][$i];
						$_FILES['attachedfile']['error']= $files['attachedfile']['error'][$i];
						$_FILES['attachedfile']['size']= $files['attachedfile']['size'][$i]; 
	
						if(!$this->upload->do_upload('attachedfile')) {
							print_r($this->upload->display_errors());
						} 
						else {
							$imageData = $this->upload->data();
							$uploadImgData[] = array(
								'borrower_id' => $inserted_id,
								'file' => $imageData['file_name'],
							);
						}
						 
					}
					$this->borrowersModel->addAttachments($inserted_id, $uploadImgData);  
				}
				       
				
				$address = array(
					'borrower_id ' => $inserted_id,
					'address1' => $this->input->post('address1'),
					'address2' => $this->input->post('address2'),
					'city' => $this->input->post('city'),
					'province' => $this->input->post('province'),
					'zipcode' => $this->input->post('zipcode'),
					'country' => $this->input->post('occupation'),
				);

				$guarantor = array(
					'borrower_id ' => $inserted_id,
					'guarantor_name' => $this->input->post('guarantor_name'),
					'guarantor_address' => $this->input->post('guarantor_address'),
					'guarantor_email' => $this->input->post('guarantor_email'),
					'guarantor_contacts' => $this->input->post('guarantor_contacts'),
					'guarantor_occupation' => $this->input->post('guarantor_occupation'),
					'guarantor_occupation_address' => $this->input->post('guarantor_occupation_address'),
				);

				$this->borrowersModel->addAddress($address);
				$this->borrowersModel->addGuarantor($guarantor);

                $this->session->set_flashdata('success', 'success');
				$this->session->set_flashdata('message', 'Borrowers has been added!');
            }else{
                $this->session->set_flashdata('message', 'Something went wrong. Please refresh the page and try again!');
            }
        }

		redirect('borrowers', 'refresh');
	}

	public function edit($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data['title'] = 'Edit Borrowers Profile';
		$data['borrower'] = $this->borrowersModel->borrower($id);

		$this->base->load('default', 'borrowers/edit_borrowers', $data);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$this->session->set_flashdata('success', 'danger');

		$this->form_validation->set_rules('firstname','Name', 'trim|required');

        if ($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('message', validation_errors());

        }else{

			$config['upload_path'] = 'assets/uploads/borrowers/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);

            if(!$this->upload->do_upload('avatar')){
				$borrower = array(
					'firstname' => $this->input->post('firstname'),
					'middlename' => $this->input->post('middlename'),
					'lastname' => $this->input->post('lastname'),
					'gender' => $this->input->post('gender'),
					'birthdate' => $this->input->post('birthdate'),
					'contact' => $this->input->post('contact'),
					'occupation' => $this->input->post('occupation'),
					'occupation_address' => $this->input->post('occupation_address'),
					'remarks' => $this->input->post('remarks'),
				);
    
            }else{
    
                $file = $this->upload->data();

                $borrower = array(
					'firstname' => $this->input->post('firstname'),
					'middlename' => $this->input->post('middlename'),
					'lastname' => $this->input->post('lastname'),
					'gender' => $this->input->post('gender'),
					'birthdate' => $this->input->post('birthdate'),
					'contact' => $this->input->post('contact'),
					'occupation' => $this->input->post('occupation'),
					'occupation_address' => $this->input->post('occupation_address'),
					'remarks' => $this->input->post('remarks'),
					'avatar' => $file['file_name'],
				);
            }

        	$this->borrowersModel->update($borrower,$id);
			$files = $_FILES;
			$uploadImgData = array();

			if(!empty($files['attachedfile']['name'][0])){
				$config['upload_path'] = 'assets/uploads/attachments/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['encrypt_name'] = TRUE;
				$this->upload->initialize($config);

				for($i=0; $i < count($files['attachedfile']['name']); $i++){           
					$_FILES['attachedfile']['name']= $files['attachedfile']['name'][$i];
					$_FILES['attachedfile']['type']= $files['attachedfile']['type'][$i];
					$_FILES['attachedfile']['tmp_name']= $files['attachedfile']['tmp_name'][$i];
					$_FILES['attachedfile']['error']= $files['attachedfile']['error'][$i];
					$_FILES['attachedfile']['size']= $files['attachedfile']['size'][$i];

					if(!$this->upload->do_upload('attachedfile')) {
						print_r($this->upload->display_errors());
					} 
					else {
						$imageData = $this->upload->data();
						$uploadImgData[] = array(
							'borrower_id' => $id,
							'file' => $imageData['file_name'],
						);
					}
				}
				$this->borrowersModel->addAttachments($id, $uploadImgData);         
			}
			
			$address = array(
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city' => $this->input->post('city'),
				'province' => $this->input->post('province'),
				'zipcode' => $this->input->post('zipcode'),
				'country' => $this->input->post('occupation'),
			);

			$guarantor = array(
				'guarantor_name' => $this->input->post('guarantor_name'),
				'guarantor_address' => $this->input->post('guarantor_address'),
				'guarantor_email' => $this->input->post('guarantor_email'),
				'guarantor_contacts' => $this->input->post('guarantor_contacts'),
				'guarantor_occupation' => $this->input->post('guarantor_occupation'),
				'guarantor_occupation_address' => $this->input->post('guarantor_occupation_address'),
			);

			$this->borrowersModel->updateAddress($address,$id);
			$this->borrowersModel->updateGuarantor($guarantor,$id);

			$this->session->set_flashdata('success', 'success');
			$this->session->set_flashdata('message', 'Borrowers has been update!');
        }

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function borrowers_profile($id)
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data['title'] = 'Borrowers Profile';
		$data['borrowers'] = $this->borrowersModel->borrowers();
		$data['profile'] = $this->borrowersModel->getborrowers($id);
		$data['files'] = $this->borrowersModel->getfiles($id);

		$data['loans'] = $this->borrowersModel->getloans($id);
		$data['transac'] = $this->paymentModel->getTransac($id);

		$this->base->load('default', 'borrowers/borrowers_profile', $data);
	}

	public function update_borrowers(){

		$config['upload_path'] = 'assets/uploads/borrowers/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);

		$this->session->set_flashdata('success', 'danger');

		$this->form_validation->set_rules('name','Full Name', 'trim|required');
		$this->form_validation->set_rules('gender','Gender', 'trim|required');
		$this->form_validation->set_rules('bdate','Birth Date', 'trim|required');
		$this->form_validation->set_rules('number','Contact Number', 'trim|required');
		$this->form_validation->set_rules('occupation','Occupation', 'trim|required');
		$this->form_validation->set_rules('em_address',"Employer's Address", 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('message', validation_errors());

        }else{

			$id = $this->input->post('id');

            if(empty($this->input->post('profileimg')) && !$this->upload->do_upload('avatar')){
				$data = array(
					'name' => $this->input->post('name'),
					'gender' => $this->input->post('gender'),
					'birthdate' => $this->input->post('bdate'),
					'number' => $this->input->post('number'),
					'occupation' => $this->input->post('occupation'),
					'employer_address' => $this->input->post('em_address'),
					'spouse_name' => $this->input->post('spouse_name'),
					'spouse_occupation' => $this->input->post('spouse_occu'),
					'spouse_em_address' => $this->input->post('spouse_em_address'),
					'address' => $this->input->post('address'),
				);
    
            } else if(!empty($this->input->post('profileimg')) && !$this->upload->do_upload('avatar')){
    
				$data = array(
					'name' => $this->input->post('name'),
					'gender' => $this->input->post('gender'),
					'birthdate' => $this->input->post('bdate'),
					'number' => $this->input->post('number'),
					'occupation' => $this->input->post('occupation'),
					'employer_address' => $this->input->post('em_address'),
					'spouse_name' => $this->input->post('spouse_name'),
					'spouse_occupation' => $this->input->post('spouse_occu'),
					'spouse_em_address' => $this->input->post('spouse_em_address'),
					'address' => $this->input->post('address'),
					'avatar' => $this->input->post('profileimg'),
				);
    
            }else{
    
                $file = $this->upload->data();
                //Resize and Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/uploads/avatar/'.$file['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['new_image'] = 'assets/uploads/avatar/'.$file['file_name'];
    
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
					'name' => $this->input->post('name'),
					'gender' => $this->input->post('gender'),
					'birthdate' => $this->input->post('bdate'),
					'number' => $this->input->post('number'),
					'occupation' => $this->input->post('occupation'),
					'employer_address' => $this->input->post('em_address'),
					'spouse_name' => $this->input->post('spouse_name'),
					'spouse_occupation' => $this->input->post('spouse_occu'),
					'spouse_em_address' => $this->input->post('spouse_em_address'),
					'address' => $this->input->post('address'),
					'avatar' => $file['file_name'],
				);
            }

            $insert =  $this->borrowersModel->update($data, $id);
    
            if($insert){
                $this->session->set_flashdata('success', 'success');
				$this->session->set_flashdata('message', 'Borrowers has been updated!');
            }else{
                $this->session->set_flashdata('message', 'No changes has been made!');
            }
        }

		redirect('borrowers', 'refresh');
	}

	public function attachment_delete($id){

		$delete = $this->borrowersModel->attachment_delete($id);
		$this->session->set_flashdata('success', 'danger');

        if($delete){
            $this->session->set_flashdata('message', 'Borrowers attachment has been deleted!');
        }else{
            $this->session->set_flashdata('message', 'Something went wrong. This borrower cannot be deleted!');
        }
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($id){

		$delete = $this->borrowersModel->delete($id);
		$this->session->set_flashdata('success', 'danger');

        if($delete){
            $this->session->set_flashdata('message', 'Borrowers has been deleted!');
        }else{
            $this->session->set_flashdata('message', 'Something went wrong. This borrower cannot be deleted!');
        }
		redirect('borrowers', 'refresh');
	}
}