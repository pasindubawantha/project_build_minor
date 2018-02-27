<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->model('BOQ_model');
    }

    public function index($project_id=NULL)
    {
        if(isset($_SESSION['user']))
        {
            if($project_id === NULL)
            {
                $data['page'] = array('header'=>'Projects', 'description'=>'pick a project or create new one','app_name'=>'PROJECTS');
                $data['user'] = $_SESSION['user'];
                $data['apps'] = $_SESSION['apps'];
                //tabs
                $tab1 = array('name'=>'Project List','link'=>base_url().'Project', 'icon'=>'fa fa-tasks');
                $tab2 = array('name'=>'New Project','link'=>base_url().'Project/new', 'icon'=>'fa fa-plus');
                $data['tabs'] = array($tab1,$tab2);
                $data['projects'] = $this->Project_model->get_projects_by_user($_SESSION['user']['id']);
                $data['data_tables'] = array('table_projects');
                $this->load->view('template/header',$data);
                $this->load->view('project/main',$data);
                $this->load->view('template/footer',$data);
            }
            else
            {
                $project = $this->Project_model->get_project_details($project_id);
                $data['page'] = array('header'=>'Project '.$project->name, 'description'=> 'project '.$project->name.' at '.$project->address ,'app_name'=>'PROJECTS');
                $data['user'] = $_SESSION['user'];
                $data['apps'] = $_SESSION['apps'];
                $data['project_id'] = $project_id;
                $data['tabs'] = $this->make_tabs($_SESSION['access'],$project_id);
                $this->load->view('template/header',$data);
                $this->load->view('project/dashboard',$data);
                $this->load->view('template/footer',$data);
            }
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

    public function boq_new($project_id)
    {
        if(isset($_SESSION['user']))
        {
            if(isset($_POST['upload']))
            {
                $target_dir = dirname(dirname(__FILE__))."/uploads/boq_new/";
                $target_file = $target_dir . basename("project_".$project_id."_".$_FILES["boq_new_file"]["name"]);
                $uploadOk = 1;
                $cvsFileType = $_FILES["boq_new_file"]["type"];
                // Check if file already exists
                if (file_exists($target_file))
                {
                    unlink($target_file);
                }
                // Check file size
                if ($_FILES["boq_new_file"]["size"] > 500000)
                {
                    $data['fail'] = true;
                    $data['message'] = "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($cvsFileType != "text/csv" && $cvsFileType != "application/vnd.ms-excel")
                {
                    $data['fail'] = true;
                    $data['message'] = "Sorry, only cvs allowed.";
                    $uploadOk = 0;
                }
                //upload file
                if ($uploadOk != 0)
                {
                    if(move_uploaded_file($_FILES["boq_new_file"]["tmp_name"], $target_file))
                    {
                        $result = $this->BOQ_model->process_cvs($project_id, $target_file, $_POST['description']);
                        $data['message'] = $result['message'];
                        if($result['success'])
                            $data['success'] = true;
                        else
                            $data['fail'] = true;
                    } else {
                        $data['fail'] = true;
                        $data['message'] = "Sorry, there was an error uploading your file.";
                    }
                }
                else
                {
                    $data['fail'] = true;
                    $data['message'] = "Sorry, there was an error uploading your file.";
                }
            }
            $project = $this->Project_model->get_project_details($project_id);
            $data['page'] = array('header'=>'Project '.$project->name, 'description'=> 'add new BOQs' ,'app_name'=>'PROJECTS');
            $data['user'] = $_SESSION['user'];
            $data['apps'] = $_SESSION['apps'];
            $data['project_id'] = $project_id;
            $data['tabs'] = $this->make_tabs($_SESSION['access'],$project_id);
            $this->load->view('template/header',$data);
            $this->load->view('project/boq/boq_new',$data);
            $this->load->view('template/footer',$data);
        }
        else
        {
            redirect('/Main/login', 'refresh');
        }
    }

    // public function dr_record($project_id, $boq_id=NULL, $boq_stage_id=NULL, $boq_item_id=NULL)
    // {
    //     $project = $this->Project_model->get_project_details($project_id);
    //     $data['page'] = array('header'=>'Project '.$project->name, 'description'=> 'record daily report'=>'PROJECTS');
    //     $data['user'] = $_SESSION['user'];
    //     $data['apps'] = $_SESSION['apps'];
    //     $data['project_id'] = $project_id;
    //     $data['tabs'] = $this->make_tabs($_SESSION['access'],$project_id);
    //     $this->load->view('template/header',$data);
    //     $this->load->view('project/dashboard',$data);
    //     $this->load->view('template/footer',$data);
    // }

    function make_tabs($access, $project_id)
    {
        //Dashboard
        $tab1 = array('name'=>'Dashboard','link'=>base_url().'Project/index/'.$project_id, 'icon'=>'fa fa-briefcase');

        //Analytics
        $tab2_1 = array('name'=>'BOQ','link'=>base_url().'Project/progress_boq/'.$project_id, 'icon'=>'fa fa-fw fa-circle-o');
        $tab2_2 = array('name'=>'Records','link'=>base_url().'Project/progress_records/'.$project_id, 'icon'=>'fa fa-fw fa-circle-o');
        $tab2 = array('name'=>'Progress', 'icon'=>'fa fa-line-chart', 'next_level'=>array($tab2_1,$tab2_2));

        //Inventory
        $tab3_1 = array('name'=>'Stock','link'=>base_url().'Project/inventory_stock/'.$project_id, 'icon'=>'fa fa-fw fa-circle-o');
        $tab3_2 = array('name'=>'GRN','link'=>base_url().'Project/inventory_grn/'.$project_id, 'icon'=>'fa fa-fw fa-circle-o');
        $tab3 = array('name'=>'Stock', 'icon'=>'fa fa-fw fa-cubes', 'next_level'=>array($tab3_1,$tab3_2));

        //Daily report
        $tab4_1 = array('name'=>'Record','link'=>base_url().'Project/dr_record/'.$project_id, 'icon'=>'fa fa-fw fa-circle-o');
        $tab4_2 = array('name'=>'History','link'=>base_url().'Project/dr_history/'.$project_id, 'icon'=>'fa fa-fw fa-circle-o');
        $tab4 = array('name'=>'Daily Report', 'icon'=>'fa fa-fw fa-cubes', 'next_level'=>array($tab4_1,$tab4_2));

        //BOQS
        $tab5_1 = array('name'=>'Edit','link'=>base_url().'Project/boq_edite/'.$project_id, 'icon'=>'fa fa-fw fa-circle-o');
        $tab5_2 = array('name'=>'New','link'=>base_url().'Project/boq_new/'.$project_id, 'icon'=>'fa fa-fw fa-circle-o');
        $tab5 = array('name'=>'BOQs', 'icon'=>'fa fa-fw fa-cubes', 'next_level'=>array($tab5_1,$tab5_2));

        $return_ary = array($tab1,$tab2,$tab3,$tab4,$tab5);


        return $return_ary;
    }
}
