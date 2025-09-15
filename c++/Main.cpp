#include <string>
#include <iostream>
#include "Laptop.cpp"
using namespace std;

int main() {
    Laptopdata laptop;
    string merk, tipe, warna;
    int harga;
    string action;

    cout << " > 1: Tambah" << endl;
    cout << " > 2: Edit" << endl;
    cout << " > 3: Hapus" << endl;
    cout << " > 4: Tampilkan" << endl;
    cout << " > 5: Keluar" << endl;

    while (true) {
        cout << "Pilihan: ";
        cin >> action;

        if (action == "1") {
            cout << "Merk: ";
            cin >> merk;
            cout << "Tipe: ";
            cin >> tipe;
            cout << "Warna: ";
            cin >> warna;
            cout << "Harga: ";
            cin >> harga;
            laptop.tambahLaptop(merk, tipe, warna, harga);
            cout << "Laptop berhasil ditambahkan:)\n";
        } 
        else if (action == "2") {
            cout << "Masukkan merk yang ingin diedit: ";
            cin >> merk;
            cout << "Tipe baru: ";
            cin >> tipe;
            cout << "Warna baru: ";
            cin >> warna;
            cout << "Harga baru: ";
            cin >> harga;
            laptop.editLaptop(merk, tipe, warna, harga);
            cout << "Laptop berhasil diedit:)\n";
        } 
        else if (action == "3") {
            cout << "Masukkan merk yang ingin dihapus: ";
            cin >> merk;
            laptop.hapusLaptop(merk); 
            cout << "Laptop dengan merk " << merk << " berhasil dihapus:)\n";
        } 
        else if (action == "4") {
            if (laptop.jumlah == 0) {
                cout << "Data Tidak ditemukan:(\n";
            } else {
                laptop.tampilLaptop();
            }
        } 
        else if (action == "5") {
            cout << "Terimakasih telah berkunjung:)\n";
            return 0;
        } 
        else {
            cout << "Data Tidak ditemukan:(\n";
        }
    }

    return 0;
}
