<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
        $this->load->model('Shop_model');
    }

    function index()
    {
        $this->data['title'] = 'Products';
        $cust_id = $this->session->userdata('id');
        $this->load->model('Billing_model');
        $this->data['userdata'] = $this->Billing_model->get_customer_details($cust_id);
        $filter = $this->input->post('filter');
        $this->data['products'] = $this->Shop_model->get_all($filter);
        $this->data['filter'] = $filter;
        $this->load->view('products', $this->data);
    }

    function logout()
    {
        $data = $this->session->all_userdata();
        foreach ($data as $row => $rows_value) {
            $this->session->unset_userdata($row);
        }
        redirect('login');
    }
}
