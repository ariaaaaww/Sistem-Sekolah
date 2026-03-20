<?php
namespace App\Models;
use App\Core\Database;

class KaryaModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function tambahLampiran($data, $namaFile) {
        $query = "INSERT INTO lampiran (judul, deskripsi, kategori, note, anggota, gambar_karya) 
                  VALUES (:judul, :deskripsi, :kategori, :note, :anggota, :gambar_karya)";
        
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('note', $data['note']);
        $this->db->bind('anggota', $data['anggota']);
        $this->db->bind('gambar_karya', $namaFile);

        return $this->db->execute();
    }
}