<?php
class Accounts_types_model extends Model {

    var $code   = '';
    var $nameEn = '';
    var $nameAr = '';
   	var $class = '';

    function Accounts_types_model()
    {
        parent::Model();
    }
    
    function get_all()
    {
        $query = $this->db->get('gl_accounts_types');
        return $query->result();
    }

    function insert()
    {
        $this->code   = $this->input->post('txtAccountTypeCode');
        $this->nameEn = $this->input->post('txtAccountTypeNameEn');
        $this->nameAr   = $this->input->post('txtAccountTypeNameAr');
        $this->class = $this->input->post('txtAccountTypeClass');

        $this->db->insert('gl_accounts_types', $this);
    }

    function update()
    {
        $this->code   = $this->input->post('txtAccountTypeCode');
        $this->nameEn = $this->input->post('txtAccountTypeNameEn');
        $this->nameAr   = $this->input->post('txtAccountTypeNameAr');
        $this->class = $this->input->post('txtAccountTypeClass');

        $this->db->update('gl_accounts_types', $this, array('id' => $this->input->post('id')));
    }

}
