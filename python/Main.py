from Laptop import Laptopdata  # import class Laptopdata dari file Laptop.py

def main():
    # buat objek Laptopdata untuk menampung semua data laptop
    laptop = Laptopdata()
    jalan = True  # variabel kontrol untuk loop menu

    # tampilkan menu utama
    print(" Selamat Datang ")
    print(" Silahkan Pilih Opsi")
    print(" 1: Tambah")
    print(" 2: Edit")
    print(" 3: Hapus")
    print(" 4: Tampilkan")
    print(" 5: Keluar")

    # perulangan menu interaktif
    while jalan:
        action = input("Pilihan: ")

        # opsi tambah laptop
        if action == "1":
            id = int(input("id: "))
            merk = input("Merk: ")
            tipe = input("Tipe: ")
            warna = input("Warna: ")
            harga = int(input("Harga: "))
            laptop.tambahLaptop(id, merk, tipe, warna, harga)
            print("Laptop berhasil ditambahkan:)\n")

        # opsi edit laptop
        elif action == "2":
            id = int(input("Masukkan id yang ingin diedit: "))
            merk = input("Merk baru: ")
            tipe = input("Tipe baru: ")
            warna = input("Warna baru: ")
            harga = int(input("Harga baru: "))
            laptop.editLaptop(id, merk, tipe, warna, harga)
            print("Laptop berhasil diedit:)\n")

        # opsi hapus laptop
        elif action == "3":
            id = int(input("Masukkan id yang ingin dihapus: "))
            laptop.hapusLaptop(id)
            print(f"Laptop dengan id {id} berhasil dihapus:)\n")

        # opsi tampilkan semua laptop
        elif action == "4":
            if laptop.jumlah == 0:
                print("Data Tidak ditemukan:(\n")
            else:
                laptop.tampilLaptop()

        # opsi keluar program
        elif action == "5":
            print("Terimakasih telah berkunjung:)")
            jalan = False  # ubah kondisi loop jadi False supaya keluar

        # jika input tidak valid
        else:
            print("Pilihan tidak valid:(\n")

# eksekusi program utama
if __name__ == "__main__":
    main()