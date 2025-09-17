from Laptop import Laptopdata

def main():
    laptop = Laptopdata()
    jalan = True

    print(" Selamat Datang ")
    print(" Silahkan Pilih Opsi")
    print(" 1: Tambah")
    print(" 2: Edit")
    print(" 3: Hapus")
    print(" 4: Tampilkan")
    print(" 5: Keluar")

    while jalan:
        action = input("Pilihan: ")

        if action == "1":
            id = int(input("id: "))
            merk = input("Merk: ")
            tipe = input("Tipe: ")
            warna = input("Warna: ")
            harga = int(input("Harga: "))
            laptop.tambahLaptop(id, merk, tipe, warna, harga)
            print("Laptop berhasil ditambahkan:)\n")

        elif action == "2":
            id = int(input("Masukkan id yang ingin diedit: "))
            merk = input("Merk baru: ")
            tipe = input("Tipe baru: ")
            warna = input("Warna baru: ")
            harga = int(input("Harga baru: "))
            laptop.editLaptop(id, merk, tipe, warna, harga)
            print("Laptop berhasil diedit:)\n")

        elif action == "3":
            id = int(input("Masukkan id yang ingin dihapus: "))
            laptop.hapusLaptop(id)
            print(f"Laptop dengan id {id} berhasil dihapus:)\n")

        elif action == "4":
            if laptop.jumlah == 0:
                print("Data Tidak ditemukan:(\n")
            else:
                laptop.tampilLaptop()

        elif action == "5":
            print("Terimakasih telah berkunjung:)")
            jalan = False  # keluar dari loop tanpa break

        else:
            print("Pilihan tidak valid:(\n")

if __name__ == "__main__":
    main()
