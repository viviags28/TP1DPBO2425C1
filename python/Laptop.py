class Laptopdata:
    def __init__(self):
        # data disimpan dalam list berisi dictionary
        self.data = []
        # jumlah menyimpan banyak data laptop
        self.jumlah = 0

    def tambahLaptop(self, id, merk, tipe, warna, harga):
        # buat dictionary untuk menyimpan data laptop
        isi = {
            "id": id,
            "merk": merk,
            "tipe": tipe,
            "warna": warna,
            "harga": harga
        }
        # tambahkan data ke list
        self.data.append(isi)
        # update jumlah data
        self.jumlah += 1

    def editLaptop(self, id, merk, tipe, warna, harga):
        # cari laptop berdasarkan id
        for i in range(self.jumlah):
            if self.data[i]["id"] == id:
                # update semua field sesuai input baru
                self.data[i]["merk"] = merk
                self.data[i]["tipe"] = tipe
                self.data[i]["warna"] = warna
                self.data[i]["harga"] = harga

    def hapusLaptop(self, id):
        # cari laptop berdasarkan id
        for i in range(self.jumlah):
            if self.data[i]["id"] == id:
                # hapus data dari list
                self.data.pop(i)
                # kurangi jumlah data
                self.jumlah -= 1
                return  # keluar setelah hapus agar tidak looping terus

    def tampilLaptop(self):
        # tampilkan semua data laptop
        for i in range(self.jumlah):
            print(f"ID   : {self.data[i]['id']}")
            print(f"Merk : {self.data[i]['merk']}")
            print(f"Tipe : {self.data[i]['tipe']}")
            print(f"Warna: {self.data[i]['warna']}")
            print(f"Harga: {self.data[i]['harga']}\n")
