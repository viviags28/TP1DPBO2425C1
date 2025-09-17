class Laptopdata:
    def __init__(self):
        self.data = []
        self.jumlah = 0

    def tambahLaptop(self, id, merk, tipe, warna, harga):
        isi = {
            "id": id,
            "merk": merk,
            "tipe": tipe,
            "warna": warna,
            "harga": harga
        }
        self.data.append(isi)
        self.jumlah += 1

    def editLaptop(self, id, merk, tipe, warna, harga):
        for i in range(self.jumlah):
            if self.data[i]["id"] == id:
                self.data[i]["merk"] = merk
                self.data[i]["tipe"] = tipe
                self.data[i]["warna"] = warna
                self.data[i]["harga"] = harga

    def hapusLaptop(self, id):
        for i in range(self.jumlah):
            if self.data[i]["id"] == id:
                self.data.pop(i)
                self.jumlah -= 1
                return

    def tampilLaptop(self):
        for i in range(self.jumlah):
            print(f"ID   : {self.data[i]['id']}")
            print(f"Merk : {self.data[i]['merk']}")
            print(f"Tipe : {self.data[i]['tipe']}")
            print(f"Warna: {self.data[i]['warna']}")
            print(f"Harga: {self.data[i]['harga']}\n")
