<?php 

class Dialog extends Controller
{

    public function SUCCESS($page_title, $success_title, $success_msg, $close_link)
    {
        $data = [
            'modal_title' => $page_title,
            'success_title' => $success_title,
            'success_message' => $success_msg,
            'close_link' => $close_link
        ];

        $this->view('/modal/success', $data);
    }


    public function FAILED($page_title, $failed_title, $failed_msg, $close_link)
    {

        $data = [
            'modal_title' => $page_title,
            'failed_title' => $failed_title,
            'failed_message' => $failed_msg,
            'close_link' => $close_link
        ];

        $this->view('/modal/failed', $data);
    }
}