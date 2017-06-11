<?php

class MY_Loader extends CI_Loader
{
    function __construct()
    {
        parent::__construct();
    }

    public function template($session, $template_name, $vars = array(), $return = FALSE)
    {
        $content = '';
        $vars['logined'] = $session->logined;
        if($vars['logined']){
            $vars['userData'] = $session;
        }

        if ($return) {
            $content .= $this->view('common/header', $vars, $return);
        } else {
            $this->view('common/header', $vars, $return);
        }
        if (is_array($template_name)) { //return all values in contents

            foreach ($template_name as $file_to_load) {
                if ($return) {
                    $content .= $this->view('' . $file_to_load, $vars, $return);
                } else {
                    $this->view('' . $file_to_load, $vars, $return);
                }
            }
        } else {
            if ($return) {
                $content .= $this->view('' . $template_name, $vars, $return);
            } else {
                $this->view('' . $template_name, $vars, $return);
            }

        }
        $this->view('common/addPost', $vars, $return);
        if ($return) {
            $content .= $this->view('common/footer', $vars, $return);
            return $content;
        } else {
            $this->view('common/footer', $vars, $return);
        }
    }
}