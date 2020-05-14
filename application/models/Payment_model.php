<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends MY_Model {

    public function getDefaultValues()
	{
		return [
			'name'		=> '',
			'bank'		=> '',
			'norek'	    => '',
		];
    }
    
    public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'name',
				'label'	=> 'Nama',
				'rules'	=> 'trim|required'
            ],
            [
				'field'	=> 'bank',
				'label'	=> 'Bank',
				'rules'	=> 'trim|required'
            ],
            [
				'field'	=> 'norek',
				'label'	=> 'norek',
				'rules'	=> 'trim|required|numeric|min_length[8]'
			]
		];

		return $validationRules;
    }
    
    public function run($input)
	{
		$data = [
			'name'		=> $input->name,
			'bank'		=> strtolower($input->bank),
			'norek'	=> $input->norek
		];

		$bank = $this->create($data);

		$sess_data = [
			'id'	=> $bank,
			'name'	=> $data['name'],
            'bank'	=> $data['bank'],
            'norek'	=> $data['norek']
		];

		$this->session->set_userdata($sess_data);
		return true;
	}

}

/* End of file Payment_model.php */
