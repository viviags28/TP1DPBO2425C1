public class Laptop {
    private static final int n = 99;

    private class LaptopData {
        private int id;
        private String merk;
        private String tipe;
        private String warna;
        private int harga;

        public void setId(int id) {
            this.id = id;
        }
        public int getId() {
            return this.id;
        }

        public void setMerk(String merk) {
            this.merk = merk;
        }
        public String getMerk() {
            return this.merk;
        }

        public void setTipe(String tipe) {
            this.tipe = tipe;
        }
        public String getTipe() {
            return this.tipe;
        }

        public void setWarna(String warna) {
            this.warna = warna;
        }
        public String getWarna() {
            return this.warna;
        }

        public void setHarga(int harga) {
            this.harga = harga;
        }
        public int getHarga() {
            return this.harga;
        }
    }

    private LaptopData[] data;
    public int jumlah;

    public Laptop() {
        data = new LaptopData[n];
        jumlah = 0;
    }

    public void tambahLaptop(int id, String merk, String tipe, String warna, int harga) {
        LaptopData isi = new LaptopData();
        isi.setId(id);
        isi.setMerk(merk);
        isi.setTipe(tipe);
        isi.setWarna(warna);
        isi.setHarga(harga);

        data[jumlah] = isi;
        jumlah++;
    }

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

    public void hapusLaptop(int id) {
        for (int i = 0; i < jumlah; i++) {
            if (data[i].getId() == id) {
                for (int j = i; j < jumlah - 1; j++) {
                    data[j] = data[j + 1];
                }
                data[jumlah - 1] = null;
                jumlah--;
                i--;
            }
        }
    }

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
