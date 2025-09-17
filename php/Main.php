<?php
require_once 'Laptop.php'; // Import class Laptop dari file terpisah

// Fungsi Tambah Laptop
function tambahLaptop() {
    echo "<h2>Tambah Laptop</h2>";
    // Form input untuk tambah laptop baru
    echo '<form method="post" enctype="multipart/form-data">
            <label>Id:</label><br>
            <input type="number" name="id" required><br>
            <label>Merk:</label><br>
            <input type="text" name="nama" required><br>
            <label>Tipe:</label><br>
            <input type="text" name="kategori" required><br>
            <label>Warna:</label><br>
            <input type="text" name="warna" required><br>
            <label>Harga:</label><br>
            <input type="number" step="0.01" name="harga" required><br>
            <label>Gambar:</label><br>
            <input type="file" name="gambar" accept="image/*"><br><br>
            <input type="submit" name="submit_tambah" value="Tambah Laptop">
          </form>';

    // Jika tombol submit ditekan
    if (isset($_POST['submit_tambah'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $warna = $_POST['warna'];
        $harga = $_POST['harga'];
        $gambarBase64 = "";

        // Jika ada file gambar diupload
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['gambar']['tmp_name'];
            $gambarData = file_get_contents($fileTmpPath); // ambil isi file
            $gambarBase64 = base64_encode($gambarData);   // ubah jadi base64
        }

        // Buat objek Laptop baru dan simpan ke session
        $laptop = new Laptop($id, $nama, $kategori, $warna, $harga, $gambarBase64);
        $_SESSION['inventory'][] = $laptop;

        echo "<p>Laptop berhasil ditambahkan:)</p>";
    }
}

// Fungsi Tampilkan Laptop
function tampilLaptop() {
    echo "<h2>Daftar Laptop</h2>";
    // Jika session kosong tampilkan pesan
    if (empty($_SESSION['inventory'])) {
        echo "<p>Belum ada laptop.</p>";
    } else {
        // Loop setiap objek Laptop lalu tampilkan info
        foreach ($_SESSION['inventory'] as $laptop) {
            $laptop->displayInfo();
        }
    }
}

// Fungsi Edit Laptop
function editLaptop() {
    echo "<h2>Edit Laptop</h2>";
    // Form cari laptop berdasarkan ID
    echo '<form method="post">
            <label>Id:</label><br>
            <input type="number" name="id_edit" required><br>
            <input type="submit" name="submit_cari" value="Cari Laptop">
          </form>';

    // Jika tombol cari ditekan
    if (isset($_POST['submit_cari'])) {
        $id_edit = $_POST['id_edit'];
        $found = false;

        // Cari laptop sesuai ID
        foreach ($_SESSION['inventory'] as $laptop) {
            if ($laptop->getId() == $id_edit) {
                $found = true;
                // Tampilkan form edit dengan data lama
                echo '<form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_edit" value="' . $laptop->getId() . '">
                        <label>Merk:</label><br>
                        <input type="text" name="nama" value="' . $laptop->getNama() . '" required><br>
                        <label>Tipe:</label><br>
                        <input type="text" name="kategori" value="' . $laptop->getKategori() . '" required><br>
                        <label>Warna:</label><br>
                        <input type="text" name="warna" value="' . $laptop->getWarna() . '" required><br>
                        <label>Harga:</label><br>
                        <input type="number" step="0.01" name="harga" value="' . $laptop->getHarga() . '" required><br>
                        <label>Gambar (kosongkan jika tidak diganti):</label><br>
                        <input type="file" name="gambar" accept="image/*"><br><br>
                        <input type="submit" name="submit_edit" value="Simpan">
                      </form>';
            }
        }

        if (!$found) {
            echo "<p>Laptop dengan ID $id_edit gk ada:(</p>";
        }
    }

    // Jika tombol simpan ditekan
    if (isset($_POST['submit_edit'])) {
        $id_edit = $_POST['id_edit'];

        // Cari laptop sesuai ID lalu update
        foreach ($_SESSION['inventory'] as &$laptop) {
            if ($laptop->getId() == $id_edit) {
                $laptop->setNama($_POST['nama']);
                $laptop->setKategori($_POST['kategori']);
                $laptop->setWarna($_POST['warna']);
                $laptop->setHarga($_POST['harga']);

                // Jika ada gambar baru diupload, update juga
                if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['gambar']['tmp_name'];
                    $gambarData = file_get_contents($fileTmpPath);
                    $gambarBase64 = base64_encode($gambarData);
                    $laptop->setGambar($gambarBase64);
                }

                echo "<p>Laptop berhasil diupdatee:)</p>";
            }
        }
    }
}

// Fungsi Hapus Laptop
function hapusLaptop() {
    echo "<h2>Hapus</h2>";
    // Form input ID laptop yang mau dihapus
    echo '<form method="post">
            <label>ID Laptop yang mau dihapus:</label><br>
            <input type="number" name="id_hapus" required><br>
            <input type="submit" name="submit_hapus" value="Hapus">
          </form>';

    // Jika tombol hapus ditekan
    if (isset($_POST['submit_hapus'])) {
        $id_hapus = $_POST['id_hapus'];
        $found = false;

        // Cari dan hapus laptop berdasarkan ID
        foreach ($_SESSION['inventory'] as $key => $laptop) {
            if ($laptop->getId() == $id_hapus) {
                unset($_SESSION['inventory'][$key]); // hapus
                $_SESSION['inventory'] = array_values($_SESSION['inventory']); // reset index array
                $found = true;
                echo "<p>Laptop berhasil dihapus:)</p>";
            }
        }

        if (!$found) {
            echo "<p>Laptop dengan ID $id_hapus gk adaaa:(</p>";
        }
    }
}

// Menu Utama
function tampilkanMenu() {
    echo "<h2>Pilih Opsi</h2>";
    echo "<ul>
            <li><a href='?menu=tambah'>Tambah</a></li>
            <li><a href='?menu=tampilkan'>Tampilkan</a></li>
            <li><a href='?menu=edit'>Edit</a></li>
            <li><a href='?menu=hapus'>Hapus</a></li>
            <li><a href='?menu=keluar'>Keluar</a></li>
          </ul>";

    // Cek menu yang dipilih user lewat parameter GET
    if (isset($_GET['menu'])) {
        $menu = $_GET['menu'];
        if ($menu == "tambah") tambahLaptop();
        elseif ($menu == "tampilkan") tampilLaptop();
        elseif ($menu == "edit") editLaptop();
        elseif ($menu == "hapus") hapusLaptop();
        elseif ($menu == "keluar") {
            echo "<p>Terimakasih telah berkunjung:)</p>";
            session_destroy(); // hapus session biar data kosong
        }
    }
}

// Inisialisasi Session
if (!isset($_SESSION['inventory'])) {
    $_SESSION['inventory'] = []; // buat array kosong jika belum ada
}

// Jalankan menu utama
tampilkanMenu();
?>
