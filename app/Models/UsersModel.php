<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    // protected $allowedFields = [
    //     'email', 'username', 'fullname', 'user_image', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
    //     'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    // ];

    public function rules()
    {
        return
            [
                'username'      => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
                'email'         => 'required|valid_email|is_unique[users.email]',
                'fullname'      => 'required',
                'password'      => 'required|strong_password',
                'pass_confirm'  => 'required|matches[password]',
            ];
    }

    public function getUsersgrup()
    {
        $builder = $this->db->table('auth_groups');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getUsers()
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
        $builder->orderBy('users.id', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getById($id)
    {
        return $this->where(['id' => $id])->first();
    }

     public function max_iduser()
    {
        $builder = $this->db->table('users');
        $builder->selectMax('id', 'hsl');
        $query = $builder->get()->getRowArray();

        $id_pegawai=$query['hsl']+1;
       
        return $id_pegawai;
    }

    public function max_idpemilik()
    {
        $builder = $this->db->table('m_pemilik_mitra');
        $builder->selectMax('id_pemilik_mitra', 'hsl');
        $query = $builder->get()->getRowArray();

        $id_pegawai=$query['hsl']+1;
       
        return $id_pegawai;
    }

    public function createdatapemilik($data)
    {
        $query = $this->db->table('m_pemilik_mitra')->insert($data);
        return $query;
    }

    public function createdatamitra($data)
    {
        $query = $this->db->table('m_mitra')->insert($data);
        return $query;
    }

    // public function updateAkses($data, $id)
    // {
    //     $query = $this->db->table('master_pegawai')->update($data, array('id_pegawai' => $id));
    //     return $query;
    // }

    // public function updateActive($data, $id)
    // {
    //     $query = $this->db->table('users')->update($data, array('id' => $id));
    //     return $query;
    // }
    public function getmaxiduser(){
        $sql = "SELECT MAX(id) as idnew from users";
        return $this->db->query($sql)->getRowArray();
    }

    public function createUser($data)
    {
        $query = $this->db->table('users')->insert($data);
        return $query;
    }
    public function createUserGrup($data)
    {
        $query = $this->db->table('auth_groups_users')->insert($data);
        return $query;
    }

    // public function createLogin($data)
    // {
    //     $query = $this->db->table('auth_groups_users')->insert($data);
    //     return $query;
    // }
    public function deleteUser($id)
    {
        $query = $this->db->table('users')->delete(array('id' => $id));
        return $query;
    }
}
