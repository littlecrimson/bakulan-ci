<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_model extends MY_Model {

    public function getDefaultValues()
    {
        return [
            'image'     => '',
        ];
    }

    public function getValidationRules()
	{
		$validationRules = [
			[
				'field' => 'image',
				'label'	=> 'Image',
				'rules'	=> 'alpha_dash|trim'
			]
		];

		return $validationRules;
	}

    public function uploadImage($fieldName, $fileName)
    {
        $config = [
            'upload_path'   => './images/promo',
            'file_name'     => $fileName,
            'allowed_types' => 'jpg|gif|png|jpeg|JPG|PNG',
            'max_size'      => 4000,
            'min_width'     => 1000,
            'min_height'    => 200,
            'overwrite'     => true,
            'file_ext_tolower'  => true
        ];

        $this->load->library('upload',$config);

        if($this->upload->do_upload($fieldName)){
            return $this->upload->data();
        }else{
            $this->session->set_flashdata('image_error', $this->upload->display_errors('','')); 
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        if(file_exists("./images/promo/$fileName")){
            unlink("./images/promo/$fileName");
        }
    }

}

/* End of file Promo_model.php */
