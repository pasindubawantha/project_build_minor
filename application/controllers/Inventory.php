<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
    }

	public function index()
    {
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'Inventory', 'description'=>'List of items','app_name'=>'INVENTORY');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['access'] = $_SESSION['access'];
            $data['items'] = $this->Item_model->get_all_items();
            $data['tabs'] = $this->make_tabs($_SESSION['access']);
            $data['data_tables'] = array('table_items');
            $this->load->view('template/header',$data);
            $this->load->view('inventory/item_list', $data);
            $this->load->view('template/footer');
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

    public function new_item()
    {
        if(isset($_SESSION['user']))
        {
        	if(isset($_POST['form']))
        	{
        		$result = $this->Item_model->new_item($_POST['description']);
        		if($result['status'])
                {
                    $data['success'] = true;
                    $data['message'] = $result['message'];
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = $result['message'];
                }
        	}
            $data['page'] = array('header'=>'Inventory', 'description'=>'New items','app_name'=>'INVENTORY');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['access'] = $_SESSION['access'];
            $data['tabs'] = $this->make_tabs($_SESSION['access']);
            $this->load->view('template/header',$data);
            $this->load->view('inventory/new_item', $data);
            $this->load->view('template/footer');
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

    function make_tabs($access)
    {
        //Items
        $tab1 = array('name'=>'Items','link'=>base_url().'Inventory', 'icon'=>'fa fa-briefcase');

        //stock
        $tab2 = array('name'=>'Stock','link'=>base_url().'Inventory/stock', 'icon'=>'fa fa-briefcase');

        //new item
        $tab3 = array('name'=>'New Item','link'=>base_url().'Inventory/new_item', 'icon'=>'fa fa-briefcase');

        $return_ary = array($tab1,$tab2,$tab3);

        return $return_ary;
    }
}
