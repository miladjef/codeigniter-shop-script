<?php

/**
 * Created by PhpStorm.
 * User: Faradars
 */
class PanelController extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->config->load('panel_config');
        $this->scope = $this->config->item('scope');
        $this->url = base_url() . $this->scope;
        self::set_scope_constants();
    }


    /***
     *
     */
    protected function set_scope_constants()
    {
        (defined('VIEW_PATH') ? "" : define('VIEW_PATH', $this->config->item('ViewsPath')));

        (defined('TEMPLATE_PATH') ? "" : define('TEMPLATE_PATH', $this->config->item('TemplatePath')));
        $_lang = "";
        (defined('TEMPLATE_NAME') ? "" : define('TEMPLATE_NAME', $this->config->item('TemplateName') . $_lang));
        (defined('TEMPLATE_ALIAS') ? "" : define('TEMPLATE_ALIAS', TEMPLATE_PATH . TEMPLATE_NAME));
        (!defined('TEMPLATE_MEANS_URL') ? define('TEMPLATE_MEANS_URL', $this->config->item('TemplatesMeansURL') . $_lang) : "");
        //Means URLS
        (!defined('MeansJS') ? define('MeansJS', base_url() . $this->config->item('TemplatesMeansURL') . TEMPLATE_NAME . "/scripts/") : "");
        (!defined('MeansCSS') ? define('MeansCSS', base_url() . $this->config->item('TemplatesMeansURL') . TEMPLATE_NAME . "/styles/") : "");
        (!defined('MeansUploads') ? define('MeansUploads', base_url() . $this->config->item('TemplatesMeansURL') . TEMPLATE_NAME . "/uploads/") : "");
        (!defined('MeansImages') ? define('MeansImages', base_url() . $this->config->item('TemplatesMeansURL') . TEMPLATE_NAME . "/img/") : "");
        (!defined('MeansLib') ? define('MeansLib', base_url() . $this->config->item('TemplatesMeansURL') . TEMPLATE_NAME . "/lib/") : "");
    }

    /**********************************************************************
     * @param $view
     * @param $parameters
     */
    public function setTemplate($view, $parameters = array())
    {
        $this->template->content->view(VIEW_PATH . $view, $parameters);
        $this->template->publish(TEMPLATE_ALIAS);
    }


    /**
     * @param $receiver
     * @param $subject
     * @param string $message
     */
    public function sendEmail($receiver, $subject, $message = "")
    {
        if ($this->settings['email_active']) {
            $this->load->library("email");
            $this->load->config('email');
            $from = array('email' => $this->settings['server_email'], 'name' => $this->settings['header_text']);

            $this->email->set_newline("rn");
            $this->email->from($from['email'], $from['name']);
            $this->email->to(array($receiver));

            $this->email->subject($subject);
            $this->email->message($message);

            if (!$this->email->send())
                $result = false;
            else
                $result = true;

            $this->MY_Model->insert($this->tables['emails'], array(
                "subject" => $subject,
                "receiver" => $receiver,
                "message" => $message,
                "sender" => $from['email'],
                "result" => $result,
                "error" => ($result == false) ? $this->email->print_debugger() : "",
                "time" => time()
            ));
        }
    }


    public function find_file_extension($file)
    {
        $ext = explode('.', $file['name']);
        return end($ext);

    }


}