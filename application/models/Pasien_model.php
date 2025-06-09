<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

    public function get_all_pasien($user_id = null, $role = null, $limit = null, $offset = null) {
        if ($role !== 'admin' && $user_id !== null) {
            $this->db->where('user_id', $user_id);
        }
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get('pasien')->result_array();
    }

    public function count_all_pasien($user_id = null, $role = null) {
        if ($role !== 'admin' && $user_id !== null) {
            $this->db->where('user_id', $user_id);
        }
        return $this->db->count_all_results('pasien');
    }
    
    public function insert_pasien($data){
        return $this->db->insert('pasien', $data);
    }

    public function delete_pasien($id) {
        $this->db->where('idpasien', $id);
        return $this->db->delete('pasien');
    }

    public function get_pasien_by_id($idpasien){
        return $this->db->get_where('pasien', ['idpasien' => $idpasien])->row_array();
    }

    public function jumlah_pasien() {
        return $this->db->count_all('pasien'); // sesuaikan nama tabel
    }

    public function update_pasien($id, $data) {
        $this->db->where('idpasien', $id);
        return $this->db->update('pasien', $data);
    }

    
    public function get_laporan_pasien($dari, $sampai) {
        $this->db->where('tgl_kunjungan >=', $dari);
        $this->db->where('tgl_kunjungan <=', $sampai);
        return $this->db->get('pasien')->result();
    }

    public function count_by_kategori($tanggal_dari = null, $tanggal_sampai = null)
{
    if ($tanggal_dari && $tanggal_sampai) {
        $this->db->where('tgl_kunjungan >=', $tanggal_dari);
        $this->db->where('tgl_kunjungan <=', $tanggal_sampai);
    }


    

    $this->db->select("
        COUNT(*) as total,
        SUM(CASE WHEN kategori = 'Diterima' THEN 1 ELSE 0 END) as diterima,
        SUM(CASE WHEN kategori = 'Ditolak' THEN 1 ELSE 0 END) as ditolak
    ");
    $query = $this->db->get('pasien');
    return $query->row();
}

}
