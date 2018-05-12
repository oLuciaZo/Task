<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_data extends CI_Model{
    function __construct()
    {
        parent::__construct(); // Call the Model constructructor
    }

    function view_hq_site(){
        $query = $this->db->query("SELECT * FROM `Device_SSH_HQ` WHERE flag=1");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return NULL;
        }
    }

    function view_hq_where($siteid){
        $query = $this->db->query("SELECT * FROM `Device_SSH_HQ` WHERE siteid=$siteid");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return NULL;
        }
    }

    function view_hq_site_group($group){
        $query = $this->db->query("SELECT * FROM `Device_SSH_HQ` WHERE group_device=$group");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return NULL;
        }
    }

    function view_branch_site(){
        $query = $this->db->query("SELECT * FROM `Device_SSH_Branch` WHERE flag=1");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return NULL;
        }
    }

    function view_branch_where($siteid){
        $query = $this->db->query("SELECT * FROM `Device_SSH_Branch` WHERE siteid=$siteid");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return NULL;
        }
    }

    function view_branch_site_group($group){
        $query = $this->db->query("SELECT * FROM `Device_SSH_Branch` WHERE group_device=$group");
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return NULL;
        }
    }

    function deployment_hq($group){
      $query = $this->db->query("SELECT * FROM `Device_SSH_HQ` WHERE group_device = '$group' ");
      if($query->num_rows() > 0){
          return $query->result();
      }else{
          return NULL;
      }
    }

    function deployment_branch($siteid,$group){
      $query = $this->db->query("SELECT * FROM `Device_SSH_Branch` WHERE siteid='$siteid' AND group_device = '$group' ");
      if($query->num_rows() > 0){
          return $query->result();
      }else{
          return NULL;
      }
    }

    function deployment_ipsec(){
      $query = $this->db->query("SELECT * FROM `Device_IPsecKey` WHERE siteid='$siteid' AND group_device = '$group' ");
      if($query->num_rows() > 0){
          return $query->result();
      }else{
          return NULL;
      }
    }

    function updatedb_hq($siteid_hq,$secretkey){
      $data = array('ipseckey' => $secretkey);
      $this->db->where('siteid', $siteid_hq);
      $this->db->update('Device_SSH_HQ', $data);
    }

    function updatedb_branch($siteid_branch,$secretkey){
      $data = array('operation' => 1,'ipseckey' => $secretkey);
      $this->db->where('siteid', $siteid_branch);
      $this->db->update('Device_SSH_Branch', $data);
    }

    function updatedb_ipseckey($group,$siteid_branch,$secretkey){
      $data = array('ipseckey' => $secretkey);
      $this->db->where('siteid_branch', $siteid_branch);
      $this->db->update('Device_IPsecKey', $data);
    }

    function adddb_ipseckey($group,$siteid_branch,$secretkey){
      $data = array('ipseckey' => $secretkey,
                    'group_device' => $group,
                    'siteid_branch' => $siteid_branch);
      $this->db->insert('Device_IPsecKey', $data);
    }

    function add_hq($LAN1, $LAN2, $SiteID, $SiteName, $Username, $Password){
      $data = array('lan1' => $LAN1,
                    'lan2' => $LAN2,
                    'siteid' => $SiteID,
                    'sitename' => $SiteName,
                    'username' => $Username,
                    'password' => $Password);
      $this->db->insert('Device_SSH_HQ', $data);
    }

    function add_branch($LAN, $WAN1, $WAN2, $SiteID, $SiteName, $Username, $Password){
      $data = array('lan' => $LAN,
                    'ipwan1' => $WAN1,
                    'ipwan2' => $WAN2,
                    'siteid' => $SiteID,
                    'sitename' => $SiteName,
                    'username' => $Username,
                    'password' => $Password);
      $this->db->insert('Device_SSH_Branch', $data);
    }

    function del_hq($siteid){
      $this->db->where('siteid', $siteid);
      $this->db->delete('Device_SSH_HQ');
    }

    function del_branch($siteid){
      $this->db->where('siteid', $siteid);
      $this->db->delete('Device_SSH_Branch');
    }

    function edit_hq($LAN1, $LAN2, $SiteID, $SiteName, $Username, $Password){
      $data = array('lan1' => $LAN1,
                    'lan2' => $LAN2,
                    'siteid' => $SiteID,
                    'sitename' => $SiteName,
                    'username' => $Username,
                    'password' => $Password);
      $this->db->where('siteid', $SiteID);
      $this->db->update('Device_SSH_HQ', $data);
    }

    function edit_branch($LAN, $WAN1, $WAN2, $SiteID, $SiteName, $Username, $Password){
      $data = array('lan' => $LAN,
                    'ipwan1' => $WAN1,
                    'ipwan2' => $WAN2,
                    'siteid' => $SiteID,
                    'sitename' => $SiteName,
                    'username' => $Username,
                    'password' => $Password);
      $this->db->where('siteid', $SiteID);
      $this->db->update('Device_SSH_Branch', $data);
    }

    function update_operation($siteid,$operation){
      $data = array('operation' => $operation);
      $this->db->where('siteid', $siteid);
      $this->db->update('Device_SSH_Branch', $data);
    }

}
