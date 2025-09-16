#include <string>
#include <iostream>
#include "Laptop.cpp"
using namespace std;

int main() {
    Laptopdata laptop;
    int id, harga;
    string merk, tipe, warna;
    string action;

    cout << " Selamat Datang " << endl;
    cout << " Silahkan Pilih Opsi" << endl;
    cout << " 1: Tambah" << endl;
    cout << " 2: Edit" << endl;
    cout << " 3: Hapus" << endl;
    cout << " 4: Tampilkan" << endl;
    cout << " 5: Keluar" << endl;

    while (true) {
        cout << "Pilihan: ";
        cin >> action;

        if (action == "1") {
            cout << "id: ";
            cin >> id;
            cout << "Merk: ";
            cin >> merk;
            cout << "Tipe: ";
            cin >> tipe;
            cout << "Warna: ";
            cin >> warna;
            cout << "Harga: ";
            cin >> harga;
            laptop.tambahLaptop(id, merk, tipe, warna, harga);
            cout << "Laptop berhasil ditambahkan:)\n";
        } 
        else if (action == "2") {
            cout << "Masukkan merk yang ingin diedit:  ";
            cin >> id;
            cout << "Merk baru: ";
            cin >> merk;
            cout << "Tipe baru: ";
            cin >> tipe;
            cout << "Warna baru: ";
            cin >> warna;
            cout << "Harga baru: ";
            cin >> harga;
            laptop.editLaptop(id, merk, tipe, warna, harga);
            cout << "Laptop berhasil diedit:)\n";
        } 
        else if (action == "3") {
            cout << "Masukkan id yang ingin dihapus: ";
            cin >> id;
            laptop.hapusLaptop(id); 
            cout << "Laptop dengan id " << id << " berhasil dihapus:)\n";
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
