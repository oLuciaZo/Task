<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->model('Model_data');
		$data['hq'] = $this->Model_data->view_hq_site();
		$data['branch'] = $this->Model_data->view_branch_site();
		$this->load->view('firstpage',$data);
	}

	public function deploy($siteid,$group)
	{
		//$data['siteid'] = $siteid;
		//$data['group'] = $group;
		$this->load->model('Model_data');
		$data['hq'] = $this->Model_data->deployment_hq($group);
		$data['branch'] = $this->Model_data->deployment_branch($siteid,$group);
		$this->load->view('deploy',$data);
		//$this->load->view('testdb1',$data);
	}

	public function updatedb($group,$siteid_branch,$secretkey,$previouskey){
		//print($siteid_hq);
		//print($siteid_branch);
		$this->load->model('Model_data');
		//$this->Model_data->updatedb_hq($siteid_hq,$secretkey);
		$this->Model_data->updatedb_branch($siteid_branch,$secretkey);
		if($previouskey!="newsite"){
		$this->Model_data->updatedb_ipseckey($group,$siteid_branch,$secretkey);
	}else{
		$this->Model_data->adddb_ipseckey($group,$siteid_branch,$secretkey);
	}
		$data['hq'] = $this->Model_data->view_hq_site_group($group);
		$data['branch'] = $this->Model_data->view_branch_site_group($group);
		$this->load->view('firstpage',$data);
		//redirect('');

	}

	public function groupid($group){
		$this->load->model('Model_data');
		$data['hq'] = $this->Model_data->view_hq_site_group($group);
		$data['branch'] = $this->Model_data->view_branch_site_group($group);
		$this->load->view('firstpage',$data);
	}




}
