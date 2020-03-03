<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pohon_model extends CI_MOdel {
    public function insert_data_pohon($data) 
    {
        $this->db->insert('t_pohon', $data);
    }

    public function dataJSON()
    {
        $this->db->select('*');
        $this->db->from('t_pohon');
        $query = $this->db->get();

        return json_encode($query->result());
    }
    public function read_data_pohon()
    {
        $query = $this->db->get('t_pohon');
        return $query;
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('t_pohon');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query;
    }

    public function update_data_pohon($data)
    {
        $idPohon = $this->input->post('id');
        $this->db->where('id', $idPohon);
        $this->db->update('t_pohon', $data);
    }

    public function getGambar($id)
    {
        $this->db->select('pict');
        $this->db->from('t_pohon');
        $this->db->where('id',$id);

        $query = $this->db->get()->row()->pict;
        return $query;
    }

    public function deletePohon($id)
    {
        $gambarName = $this->getGambar($id);
        $qrName = $this->getQR($id);

        //hapus gambar pohon
        unlink('./uploads/'.$gambarName);
        
        //hapus gambar qr code
        unlink('./qrpohon/image/'.$qrName);

        //hapus data pohon di database
        $this->db->where('id', $id);
        $this->db->delete('t_pohon');
    }

    public function getQR($id)
    {
        $this->db->select('qr_code');
        $this->db->from('t_pohon');
        $this->db->where('id', $id);

        $query = $this->db->get()->row()->qr_code;
        return $query;
    }
}