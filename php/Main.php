<?php

require_once 'Laptop.php';

// Tambah
function tambahLaptop() {
    echo "<h2>Tambah Laptop</h2>";
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

    if (isset($_POST['submit_tambah'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $warna = $_POST['warna'];
        $harga = $_POST['harga'];
        $gambarBase64 = "";

        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['gambar']['tmp_name'];
            $gambarData = file_get_contents($fileTmpPath);
            $gambarBase64 = base64_encode($gambarData);
        }

        $laptop = new Laptop($id, $nama, $kategori, $warna, $harga, $gambarBase64);
        $_SESSION['inventory'][] = $laptop;

        echo "<p>Laptop berhasil ditambahkan:)</p>";
    }
}

// Tampil
function tampilLaptop() {
    echo "<h2>Daftar Laptop</h2>";
    if (empty($_SESSION['inventory'])) {
        echo "<p>Belum ada laptop.</p>";
    } else {
        foreach ($_SESSION['inventory'] as $laptop) {
            $laptop->displayInfo();
        }
    }
}

// Edit
function editLaptop() {
    echo "<h2>Edit Laptop</h2>";
    echo '<form method="post">
            <label>Id:</label><br>
            <input type="number" name="id_edit" required><br>
            <input type="submit" name="submit_cari" value="Cari Laptop">
          </form>';

    if (isset($_POST['submit_cari'])) {
        $id_edit = $_POST['id_edit'];
        $found = false;

        foreach ($_SESSION['inventory'] as $laptop) {
            if ($laptop->getId() == $id_edit) {
                $found = true;
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

    if (isset($_POST['submit_edit'])) {
        $id_edit = $_POST['id_edit'];

        foreach ($_SESSION['inventory'] as &$laptop) {
            if ($laptop->getId() == $id_edit) {
                $laptop->setNama($_POST['nama']);
                $laptop->setKategori($_POST['kategori']);
                $laptop->setWarna($_POST['warna']);
                $laptop->setHarga($_POST['harga']);

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

// Hapus
function hapusLaptop() {
    echo "<h2>Hapus</h2>";
    echo '<form method="post">
            <label>ID Laptop yang mau dihapus:</label><br>
            <input type="number" name="id_hapus" required><br>
            <input type="submit" name="submit_hapus" value="Hapus">
          </form>';

    if (isset($_POST['submit_hapus'])) {
        $id_hapus = $_POST['id_hapus'];
        $found = false;

        foreach ($_SESSION['inventory'] as $key => $laptop) {
            if ($laptop->getId() == $id_hapus) {
                unset($_SESSION['inventory'][$key]);
                $_SESSION['inventory'] = array_values($_SESSION['inventory']);
                $found = true;
                echo "<p>Laptop berhasil dihapus:)</p>";
            }
        }

        if (!$found) {
            echo "<p>Laptop dengan ID $id_hapus gk adaaa:(</p>";
        }
    }
}

// Menu utama
function tampilkanMenu() {
    echo "<h2>Pilih Opsi</h2>";
    echo "<ul>
            <li><a href='?menu=tambah'>Tambah</a></li>
            <li><a href='?menu=tampilkan'>Tampilkan</a></li>
            <li><a href='?menu=edit'>Edit</a></li>
            <li><a href='?menu=hapus'>Hapus</a></li>
            <li><a href='?menu=keluar'>Keluar</a></li>
          </ul>";

    if (isset($_GET['menu'])) {
        $menu = $_GET['menu'];
        if ($menu == "tambah") tambahLaptop();
        elseif ($menu == "tampilkan") tampilLaptop();
        elseif ($menu == "edit") editLaptop();
        elseif ($menu == "hapus") hapusLaptop();
        elseif ($menu == "keluar") {
            echo "<p>Terimakasih telah berkunjung:)</p>";
            session_destroy();
        }
    }
}

// Inisialisasi
if (!isset($_SESSION['inventory'])) {
    $_SESSION['inventory'] = [];
}

// Jalankan menu
tampilkanMenu();
?>
