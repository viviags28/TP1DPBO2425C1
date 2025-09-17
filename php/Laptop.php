<?php
session_start(); // Mulai session agar data bisa disimpan sementara

// Kelas Laptop untuk menyimpan data laptop
class Laptop {
    // Properti private hanya bisa diakses lewat getter dan setter
    private $id;
    private $nama;      
    private $kategori;  
    private $warna;
    private $harga;
    private $gambar;    

    // Constructor untuk inisialisasi data laptop saat objek dibuat
    public function __construct($id, $nama, $kategori, $warna, $harga, $gambar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->warna = $warna;
        $this->harga = $harga;
        $this->gambar = $gambar;
    }

    // Getter ID (ID tidak ada setter supaya tetap unik)
    public function getId() { return $this->id; }

    // Getter dan Setter Nama
    public function getNama() { return $this->nama; }
    public function setNama($nama) { $this->nama = $nama; }

    // Getter dan Setter Kategori
    public function getKategori() { return $this->kategori; }
    public function setKategori($kategori) { $this->kategori = $kategori; }

    // Getter dan Setter Warna
    public function getWarna() { return $this->warna; }
    public function setWarna($warna) { $this->warna = $warna; }

    // Getter dan Setter Harga
    public function getHarga() { return $this->harga; }
    public function setHarga($harga) { $this->harga = $harga; }

    // Getter dan Setter Gambar (disimpan dalam bentuk base64)
    public function getGambar() { return $this->gambar; }
    public function setGambar($gambar) { $this->gambar = $gambar; }

    // Fungsi untuk menampilkan informasi laptop ke halaman web
    public function displayInfo() {
        echo "<p><strong>ID:</strong> " . htmlspecialchars($this->id) . "</p>";
        echo "<p><strong>Nama:</strong> " . htmlspecialchars($this->nama) . "</p>";
        echo "<p><strong>Kategori:</strong> " . htmlspecialchars($this->kategori) . "</p>";
        echo "<p><strong>Warna:</strong> " . htmlspecialchars($this->warna) . "</p>";
        echo "<p><strong>Harga:</strong> Rp " . number_format($this->harga, 2, ',', '.') . "</p>";
        
        // Jika ada gambar, tampilkan dalam tag <img>, jika tidak ada tampilkan teks
        if ($this->gambar) {
            echo "<p><strong>Gambar:</strong><br>";
            echo "<img src='data:image/*;base64," . $this->gambar . "' style='max-width:200px;'></p>";
        } else {
            echo "<p>(tidak ada gambar:()</p>";
        }
        echo "</div>";
    }
}
?>
