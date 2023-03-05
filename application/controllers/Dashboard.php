<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data['title'] = 'Dashboard';

		$data['borrowers'] = $this->dashboardModel->getborrowers();
		$data['loans'] = $this->dashboardModel->getloans();
		$profit = $this->dashboardModel->getprofit();
		$penalty = $this->dashboardModel->getpenalty();

		$data['profit'] = ($profit->total_amount - $profit->principal) + $penalty->p_penalty;
		$data['revenue'] = $this->dashboardModel->getrevenue();

		$this->base->load('default', 'dashboard', $data);
	}

	public function getloans(){
		$validator = array('total' => array(), 'active' => array(), 'paid' => array());
		
		$validator['total'] = $this->dashboardModel->getloans();
		$validator['active'] = $this->dashboardModel->getactiveloan();
		$validator['paid'] = $this->dashboardModel->getpaid();

		echo json_encode($validator);
	}

	public function getRevenue(){
		$validator = array(
			'jan' => array(), 
			'feb' => array(), 
			'mar' => array(),
			'apr' => array(), 
			'may' => array(), 
			'jun' => array(),
			'jul' => array(), 
			'aug' => array(), 
			'sep' => array(),
			'oct' => array(), 
			'nov' => array(), 
			'dec' => array(),
		);
		$validator['jan'] = $this->dashboardModel->getRev(1);
		$validator['feb'] = $this->dashboardModel->getRev(2);
		$validator['mar'] = $this->dashboardModel->getRev(3);
		$validator['apr'] = $this->dashboardModel->getRev(4);
		$validator['may'] = $this->dashboardModel->getRev(5);
		$validator['jun'] = $this->dashboardModel->getRev(6);
		$validator['jul'] = $this->dashboardModel->getRev(7);
		$validator['aug'] = $this->dashboardModel->getRev(8);
		$validator['sep'] = $this->dashboardModel->getRev(9);
		$validator['oct'] = $this->dashboardModel->getRev(10);
		$validator['nov'] = $this->dashboardModel->getRev(11);
		$validator['dec'] = $this->dashboardModel->getRev(12);
		
		echo json_encode($validator);
	}
}