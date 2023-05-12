<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Combobox extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Combobox_model');
    }


    public function index()
    {
        $this->load->view('combobox_view');
    }

    // Provinsi
    public function getdataprov()
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->Combobox_model->getprov($searchTerm);
        echo json_encode($response);
    }

    // Kabupaten
    public function getdatakab($id_prov)
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->Combobox_model->getkab($id_prov, $searchTerm);
        echo json_encode($response);
    }

    // Kecamatan
    public function getdatakec($id_kab)
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->Combobox_model->getkec($id_kab, $searchTerm);
        echo json_encode($response);
    }

    // Kelurahan
    public function getdatakel($id_kec)
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->Combobox_model->getkel($id_kec, $searchTerm);
        echo json_encode($response);
    }
}
