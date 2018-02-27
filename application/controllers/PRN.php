<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PRN extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PRN_model');
        $this->load->model('Project_model');
        $this->load->model('Item_model');
        $this->load->model('Supplier_model');
    }

    public function index()
    {
        if(isset($_SESSION['user']))
        {
            $data['page'] = array('header'=>'Purchase Request Note', 'description'=>'purchase request note','app_name'=>'PRN');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['access'] = $_SESSION['access'];
            $data['items'] = $this->Item_model->get_all_items();
            $data['projects'] = $this->Project_model->get_projects_by_user($_SESSION['user']['id']);
            $data['suppliers'] = $this->Supplier_model->get_all_suppliers();
            $this->load->view('template/header',$data);
            $this->load->view('prn/prn', $data);
            $this->load->view('template/footer');
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

}
