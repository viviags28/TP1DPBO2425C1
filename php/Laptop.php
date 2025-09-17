<?php
session_start();
class Laptop {
    private $id;
    private $nama;      
    private $kategori;  
    private $warna;
    private $harga;
    private $gambar;    

    public function __construct($id, $nama, $kategori, $warna, $harga, $gambar) {
        $this->id = $id;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->warna = $warna;
        $this->harga = $harga;
        $this->gambar = $gambar;
    }

    public function getId() { return $this->id; }

    public function getNama() { return $this->nama; }
    public function setNama($nama) { $this->nama = $nama; }

    public function getKategori() { return $this->kategori; }
    public function setKategori($kategori) { $this->kategori = $kategori; }

    public function getWarna() { return $this->warna; }
    public function setWarna($warna) { $this->warna = $warna; }

    public function getHarga() { return $this->harga; }
    public function setHarga($harga) { $this->harga = $harga; }

    public function getGambar() { return $this->gambar; }
    public function setGambar($gambar) { $this->gambar = $gambar; }

    public function displayInfo() {
        echo "<p><strong>ID:</strong> " . htmlspecialchars($this->id) . "</p>";
        echo "<p><strong>Nama:</strong> " . htmlspecialchars($this->nama) . "</p>";
        echo "<p><strong>Kategori:</strong> " . htmlspecialchars($this->kategori) . "</p>";
        echo "<p><strong>Warna:</strong> " . htmlspecialchars($this->warna) . "</p>";
        echo "<p><strong>Harga:</strong> Rp " . number_format($this->harga, 2, ',', '.') . "</p>";
        if ($this->gambar) {
            echo "<p><strong>Gambar:</strong><br>";
            echo "<img src='data:image/*;base64," . $this->gambar . "' style='max-width:200px;'></p>";
        } else {
            echo "<p>(tidak ada gambar)</p>";
        }
        echo "</div>";
    }
}
?>
