<?php
class Template extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function loadview_auth($data = NULL, $page = NULL)
    {

        if ($page != NULL) {
            $this->load->view($page, $data);
        } else {
            $this->load->view($data);
        }
    }

    function loadview($data = NULL, $page = NULL)
    {
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('topbar', $data);
        if ($page != NULL) {
            $this->load->view($page, $data);
        } else {
            $this->load->view('content', $data);
        }
        $this->load->view('footer', $data);
    }

    function loadview2($data = NULL, $page = NULL)
    {
        $this->load->view('header', $data);
        // $this->load->view('topbar', $data);
        // $this->load->view('sidebar', $data);
        // if ($page != NULL) {
        //     $this->load->view($page, $data);
        // } else {
        //     $this->load->view('content', $data);
        // }
        $this->load->view('dashboard', $data);
    }

    function loadview_display($data = NULL, $page = NULL)
    {
        $this->load->view('display_antrian', $data);
        $this->load->view('header_display', $data);
        // $this->load->view('topbar', $data);
        // $this->load->view('sidebar_display', $data);
        if ($page != NULL) {
            $this->load->view($page, $data);
        } else {
            $this->load->view('content', $data);
        }
        $this->load->view('footer', $data);
    }

    function loadview_map($data = NULL, $page = NULL)
    {
        $this->load->view('display_map', $data);
        $this->load->view('header_map', $data);
        // $this->load->view('topbar', $data);
        // $this->load->view('sidebar_display', $data);
        if ($page != NULL) {
            $this->load->view($page, $data);
        } else {
            $this->load->view('content', $data);
        }
        $this->load->view('footer', $data);
    }
}
