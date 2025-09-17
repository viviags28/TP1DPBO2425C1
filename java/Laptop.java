public class Laptop {
    // Konstanta jumlah maksimal data laptop
    private static final int n = 99;

    // Inner class untuk menyimpan data tiap laptop
    private class LaptopData {
        private int id;
        private String merk;
        private String tipe;
        private String warna;
        private int harga;

        // Setter dan Getter untuk ID
        public void setId(int id) {
            this.id = id;
        }
        public int getId() {
            return this.id;
        }

        // Setter dan Getter untuk Merk
        public void setMerk(String merk) {
            this.merk = merk;
        }
        public String getMerk() {
            return this.merk;
        }

        // Setter dan Getter untuk Tipe
        public void setTipe(String tipe) {
            this.tipe = tipe;
        }
        public String getTipe() {
            return this.tipe;
        }

        // Setter dan Getter untuk Warna
        public void setWarna(String warna) {
            this.warna = warna;
        }
        public String getWarna() {
            return this.warna;
        }

        // Setter dan Getter untuk Harga
        public void setHarga(int harga) {
            this.harga = harga;
        }
        public int getHarga() {
            return this.harga;
        }
    }

    // Array untuk menyimpan daftar laptop
    private LaptopData[] data;
    // Jumlah laptop yang tersimpan
    public int jumlah;

    // Konstruktor kelas Laptop
    public Laptop() {
        data = new LaptopData[n]; // alokasi array
        jumlah = 0;               // awalnya kosong
    }

    // Method untuk menambah data laptop baru
    public void tambahLaptop(int id, String merk, String tipe, String warna, int harga) {
        LaptopData isi = new LaptopData();
        isi.setId(id);
        isi.setMerk(merk);
        isi.setTipe(tipe);
        isi.setWarna(warna);
        isi.setHarga(harga);

        data[jumlah] = isi; // simpan ke array
        jumlah++;           // jumlah bertambah
    }

    // Method untuk mengedit data laptop berdasarkan id
    public void editLaptop(int id, String merk, String tipe, String warna, int harga) {
        for (int i = 0; i < jumlah; i++) {
            if (data[i].getId() == id) {
                if (!data[i].getMerk().equals(merk)) {
                    data[i].setMerk(merk);
                }
                if (!data[i].getTipe().equals(tipe)) {
                    data[i].setTipe(tipe);
                }
                if (!data[i].getWarna().equals(warna)) {
                    data[i].setWarna(warna);
                }
                if (data[i].getHarga() != harga) {
                    data[i].setHarga(harga);
                }
            }
        }
    }

    // Method untuk menghapus data laptop berdasarkan id
    public void hapusLaptop(int id) {
        for (int i = 0; i < jumlah; i++) {
            if (data[i].getId() == id) {
                // geser semua elemen setelahnya ke kiri
                for (int j = i; j < jumlah - 1; j++) {
                    data[j] = data[j + 1];
                }
                data[jumlah - 1] = null; // hapus elemen terakhir
                jumlah--;                // kurangi jumlah
                i--;                     // cek ulang index ini
            }
        }
    }

    // Method untuk menampilkan semua data laptop
    public void tampilLaptop() {
        for (int i = 0; i < jumlah; i++) {
            System.out.println("ID   : " + data[i].getId());
            System.out.println("Merk : " + data[i].getMerk());
            System.out.println("Tipe : " + data[i].getTipe());
            System.out.println("Warna: " + data[i].getWarna());
            System.out.println("Harga: " + data[i].getHarga());
            System.out.println();
        }
    }
}
