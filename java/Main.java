import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        Laptop laptop = new Laptop();

        int id, harga;
        String merk, tipe, warna;
        String action;

        System.out.println(" Selamat Datang ");
        System.out.println(" Silahkan Pilih Opsi");
        System.out.println(" 1: Tambah");
        System.out.println(" 2: Edit");
        System.out.println(" 3: Hapus");
        System.out.println(" 4: Tampilkan");
        System.out.println(" 5: Keluar");

        while (true) {
            System.out.print("Pilihan: ");
            action = sc.nextLine();

            if (action.equals("1")) {
                System.out.print("id: ");
                id = Integer.parseInt(sc.nextLine());
                System.out.print("Merk: ");
                merk = sc.nextLine();
                System.out.print("Tipe: ");
                tipe = sc.nextLine();
                System.out.print("Warna: ");
                warna = sc.nextLine();
                System.out.print("Harga: ");
                harga = Integer.parseInt(sc.nextLine());
                laptop.tambahLaptop(id, merk, tipe, warna, harga);
                System.out.println("Laptop berhasil ditambahkan:)");
            } 
            else if (action.equals("2")) {
                System.out.print("Masukkan id yang ingin diedit: ");
                id = Integer.parseInt(sc.nextLine());
                System.out.print("Merk baru: ");
                merk = sc.nextLine();
                System.out.print("Tipe baru: ");
                tipe = sc.nextLine();
                System.out.print("Warna baru: ");
                warna = sc.nextLine();
                System.out.print("Harga baru: ");
                harga = Integer.parseInt(sc.nextLine());
                laptop.editLaptop(id, merk, tipe, warna, harga);
                System.out.println("Laptop berhasil diedit:)");
            } 
            else if (action.equals("3")) {
                System.out.print("Masukkan id yang ingin dihapus: ");
                id = Integer.parseInt(sc.nextLine());
                laptop.hapusLaptop(id);
                System.out.println("Laptop dengan id " + id + " berhasil dihapus:)");
            } 
            else if (action.equals("4")) {
                if (laptop.jumlah == 0) {
                    System.out.println("Data Tidak ditemukan:(");
                } else {
                    laptop.tampilLaptop();
                }
            } 
            else if (action.equals("5")) {
                System.out.println("Terimakasih telah berkunjung:)");
                break;
            } 
            else {
                System.out.println("Pilihan tidak valid:(");
            }
        }

        sc.close();
    }
}
