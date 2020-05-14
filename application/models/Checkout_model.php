<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends MY_Model {

    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            'name'      => '',
            'alamat'    => '',
            'phone'     => '',
            'status'    => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'     => 'name',
                'label'     => 'Nama',
                'rules'     => 'required|trim'
            ],
            [
                'field'     => 'alamat',
                'label'     => 'Alamat',
                'rules'     => 'required|trim'
            ],
            [
                'field'     => 'phone',
                'label'     => 'Telepon',
                'rules'     => 'required|numeric|max_length[15]'
            ],
        ];

        return $validationRules;
    }

}

/* End of file Checkout_model.php */
