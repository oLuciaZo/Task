<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

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


	public function adddevicesHQ()
	{
		$this->load->helper('url');
		$this->load->view('Add_HQ');
		//echo "HE";
	}
	public function adddevicesBranch()
	{
		$this->load->helper('url');
		$this->load->view('Add_Branch');
		//echo "HE";
	}

	public function add_hq(){

		if(isset($_POST['LAN1'])){
			$LAN1 = $_POST['LAN1'];
		}
		if(isset($_POST['LAN2'])){
			$LAN2 = $_POST['LAN2'];
		}
		if(isset($_POST['SiteID'])){
			$SiteID = $_POST['SiteID'];
		}
		if(isset($_POST['SiteName'])){
			$SiteName = $_POST['SiteName'];
		}
		if(isset($_POST['Username'])){
			$Username = $_POST['Username'];
		}
		if(isset($_POST['Password'])){
			$Password = $_POST['Password'];
		}
		$this->load->model('Model_data');
		$this->Model_data->add_hq($LAN1, $LAN2, $SiteID, $SiteName, $Username, $Password);
		$data['hq'] = $this->Model_data->view_hq_site();
		$data['branch'] = $this->Model_data->view_branch_site();
		$this->load->helper('url');
		$this->load->view('secondpage',$data);

	}

	public function add_branch(){
		if(isset($_POST['LAN'])){
			$LAN = $_POST['LAN'];
		}
		if(isset($_POST['WAN1'])){
			$WAN1 = $_POST['WAN1'];
		}
		if(isset($_POST['WAN2'])){
			$WAN2 = $_POST['WAN2'];
		}
		if(isset($_POST['SiteID'])){
			$SiteID = $_POST['SiteID'];
		}
		if(isset($_POST['SiteName'])){
			$SiteName = $_POST['SiteName'];
		}
		if(isset($_POST['Username'])){
			$Username = $_POST['Username'];
		}
		if(isset($_POST['Password'])){
			$Password = $_POST['Password'];
		}
		$this->load->model('Model_data');
		$this->Model_data->add_branch($LAN, $WAN1, $WAN2, $SiteID, $SiteName, $Username, $Password);
		$data['hq'] = $this->Model_data->view_hq_site();
		$data['branch'] = $this->Model_data->view_branch_site();
		$this->load->helper('url');
		$this->load->view('firstpage',$data);

	}

	public function del_hq($siteid){
		$this->load->model('Model_data');
		$this->Model_data->del_hq($siteid);
		$data['hq'] = $this->Model_data->view_hq_site();
		$data['branch'] = $this->Model_data->view_branch_site();
		//$this->load->helper('url');
		//$this->load->view('firstpage',$data);
		redirect('');
	}

	public function del_branch($siteid){
		$this->load->model('Model_data');
		$this->Model_data->del_branch($siteid);
		$data['hq'] = $this->Model_data->view_hq_site();
		$data['branch'] = $this->Model_data->view_branch_site();
		//$this->load->view('firstpage',$data);
		redirect('');
	}

	public function callback_edit_hq($siteid){
		$this->load->model('Model_data');
		$data['hq'] = $this->Model_data->view_hq_where($siteid);
		$this->load->view('Edit_HQ',$data);
	}

	public function callback_edit_branch($siteid){
		$this->load->model('Model_data');
		$data['hq'] = $this->Model_data->view_branch_where($siteid);
		$this->load->view('Edit_Branch',$data);
	}

	public function edit_hq(){
		if(isset($_POST['LAN1'])){
			$LAN1 = $_POST['LAN1'];
		}
		if(isset($_POST['LAN2'])){
			$LAN2 = $_POST['LAN2'];
		}
		if(isset($_POST['SiteID'])){
			$SiteID = $_POST['SiteID'];
		}
		if(isset($_POST['SiteName'])){
			$SiteName = $_POST['SiteName'];
		}
		if(isset($_POST['Username'])){
			$Username = $_POST['Username'];
		}
		if(isset($_POST['Password'])){
			$Password = $_POST['Password'];
		}
		$this->load->model('Model_data');
		$this->Model_data->edit_hq($LAN1, $LAN2, $SiteID, $SiteName, $Username, $Password);
		$data['hq'] = $this->Model_data->view_hq_site();
		$data['branch'] = $this->Model_data->view_branch_site();
		$this->load->view('firstpage',$data);
	}

	public function edit_branch(){
		if(isset($_POST['LAN'])){
			$LAN = $_POST['LAN'];
		}
		if(isset($_POST['WAN1'])){
			$WAN1 = $_POST['WAN1'];
		}
		if(isset($_POST['WAN2'])){
			$WAN2 = $_POST['WAN2'];
		}
		if(isset($_POST['SiteID'])){
			$SiteID = $_POST['SiteID'];
		}
		if(isset($_POST['SiteName'])){
			$SiteName = $_POST['SiteName'];
		}
		if(isset($_POST['Username'])){
			$Username = $_POST['Username'];
		}
		if(isset($_POST['Password'])){
			$Password = $_POST['Password'];
		}
		$this->load->model('Model_data');
		$this->Model_data->edit_branch($LAN, $WAN1, $WAN2, $SiteID, $SiteName, $Username, $Password);
		$data['hq'] = $this->Model_data->view_hq_site();
		$data['branch'] = $this->Model_data->view_branch_site();
		$this->load->view('firstpage',$data);
	}

	public function update_operation($siteid,$operation){
		$this->load->model('Model_data');
		$this->Model_data->update_operation($siteid,$operation);
		$data['hq'] = $this->Model_data->view_hq_site();
		$data['branch'] = $this->Model_data->view_branch_site();
		$this->load->view('firstpage',$data);
	}

	public function test(){
		$this->load->view('Add_User');
	}

}
