<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Corn extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_form');
    }

    public function upload()
    {
        $emailContent = $this->model_form->fetch();

        if (!empty($emailContent)) {
            $this->config = require_once(__DIR__ . '/../../config.php');

            $config = array();
            $config['protocol']         = 'smtp';
            $config['smtp_host']        = $this->config['smtp_host'];
            $config['smtp_crypto']      = 'ssl';
            $config['smtp_port']        = $this->config['smtp_port'];
            $config['smtp_user']        = $this->config['smtp_user'];
            $config['smtp_pass']        = $this->config['smtp_pass'];
            $config['mailtype']         = 'text';
            $config['charset']          = 'iso-8859-1';
            $config['wordwrap']         = 'TRUE';
            $config['smtp_keepalive']     = TRUE;

            $this->load->library('email', $config);

            foreach ($emailContent as $key => $value) {
                if ($this->sendEmail($value)) {
                    $params = array(
                        'file' => $value['pdf'],
                        'filename' => basename($value['pdf']),
                        'mimetype' => 'application/pdf',
                        'data' => chunk_split(base64_encode(file_get_contents($value['pdf'])))
                    );

                    $this->httpPost($this->config['gscript_URL'], $params);

                    $this->removePDF($value['pdf']);

                   $this->model_form->delete($value['id']);
                }
            }
        }
    }

    private function sendEmail($emailContent)
    {
        $this->email->clear(true);

        $this->email->from($this->config['smtp_sender'], 'Rental Tracker');
        $this->email->to($this->config['default_mail']);
        $this->email->subject($emailContent['subject']);
        $this->email->message($emailContent['body']);
        $this->email->attach($emailContent['pdf']);

        return $this->email->send(true) ? TRUE : FALSE;
    }

    private function removePDF($src)
    {
        if (isset($src)) {
            unlink($src);
        }
    }

    private function httpPost($url, $data)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curl);
        curl_close($curl);
    }
}
