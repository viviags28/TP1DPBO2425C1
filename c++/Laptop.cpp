#include <iostream>
#include <string>
using namespace std;

const int n = 99;

class Laptopdata{
private:
struct Laptop
{
    int id;
    string merk;
    string tipe;
    string warna;
    int harga;

    void setId(int id){
        this->id = id;
    }
    int getId(){
        return this->id;
    }
    void setMerk(string merk){
        this->merk = merk;
    }
    string getMerk(){
        return this->merk;
    }
    void setTipe(string tipe){
        this->tipe = tipe;
    }
    string getTipe(){
        return this->tipe;
    }
    void setWarna(string warna){
        this->warna = warna;
    }
    string getWarna(){
        return this->warna;
    }
    void setHarga(int harga){
        this->harga = harga;
    }
    int getHarga(){
        return this->harga;
    }
};

    
    Laptop data[n];

public:
int jumlah;
    Laptopdata(){
        jumlah = 0;
    }

    void tambahLaptop(int id, string merk, string tipe, string warna, int harga){
        Laptop isi ={id, merk, tipe, warna, harga};
        data[jumlah] = isi;
        jumlah++;
    }

    void editLaptop(int id, string merk, string tipe, string warna, int harga) {
    for (int i = 0; i < jumlah; i++) {
        if (data[i].getId() == id) {
            if (data[i].getMerk() != merk) {
                data[i].setMerk(merk);
            }
            if (data[i].getTipe() != tipe) {
                data[i].setTipe(tipe);
            }
            if (data[i].getWarna() != warna) {
                data[i].setWarna(warna);
            }
            if (data[i].getHarga() != harga) {
                data[i].setHarga(harga);
            }
        }
    }
}

void hapusLaptop(int id) {
    for (int i = 0; i < jumlah; i++) {  
        if (data[i].getId() == id) {
            // geser elemen ke kiri
            for (int j = i; j < jumlah - 1; j++) {
                data[j] = data[j + 1];
            }
            jumlah--;
            i--; // supaya posisi i dicek lagi setelah geser
        }
    }
}

    void tampilLaptop(){
        for(int i=0; i<jumlah; i++){
            cout << "ID   : " << data[i].getId() << endl;
            cout << "Merk : " << data[i].getMerk() << endl;
            cout << "Tipe : " << data[i].getTipe() << endl;
            cout << "Warna : " << data[i].getWarna() << endl;
            cout << "Harga : " << data[i].getHarga() << endl;
            cout << endl;
        }
    }

    ~Laptopdata(){
    } 
};