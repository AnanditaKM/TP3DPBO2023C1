# TP3DPBO2023C1
## Janji
Saya Anandita Kusumah Mulyadi dengan nim 2101114 mengerjakan Tugas Praktikum 3 DPBO dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Desain Database
<img width="401" alt="desain_db" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/194377be-8133-4786-baae-4de8bac6f514">

## Penjelasan
- Pada Tugas praktikum 3 ini saya membuat program penyimpan data produk.
- Dimana terdiri dari 3 tabel yaitu data produk, data supermarket dan data kategori
- Dalam tabel Produk terdapat id_Produk(Primary Key),nama_Produk,harga,stok,foto_produk,category_id(foreign key), supermarket_id(foreign key).
- Dalam tabel Supermarket terdapat supermarket_id(Primary Key), nama_supermarket.
- Dalam tabel kategori terdapat category_id(Primary Key), nama_kategori.

## ALUR PROGRAM
- ### Tampilan Home
    <img width="500" alt="image" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/16657a0f-7c74-4be9-a101-e76cc2fdd14a">
    
  - Pada Tampilan Home berisikan sebagai berikut:
     - Terdapat daftar produk yang berisikan List Produk dengan tampilan berupa foto produk, nama produk, kategori produk, dan kategori produk.
     - Terdapat filter untuk melakukan pengurutan bisa mengurutkan berdasarkan nama produk, nama Supermarket dan nama Kategori secara Ascending.
     
          <img width="500" alt="gif" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/89253783-09a6-40d9-b586-f71ff63bd812">

     - jika diklik produknya maka akan menampilkan detail produk nya beserta button ubah data dan hapus data.
     
         <img width="500" alt="gif" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/e2c8aa0a-ec25-4e8e-bf03-efb9ab3fb49f">

     - ketika mengklik ketika mengklik button 'ubah data' akan menampilkan data produk yang dapat diubah oleh user setelah diubah lalu klik tombol 'submit' maka            akan kembali ke tampilan home , tetapi jika nengklik button 'hapus data' maka data produk akan dihapus.
     
         <img width="500" alt="gif" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/5f89e48e-e792-4695-b23c-08c2fcd65350">
       
     - Terdapat searching produk yang dapat mencari produk dengan nama produknya 
          
          <img width="500" alt="gif" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/43a5ae4c-3b6c-4131-8561-9508bd3c8655">

           
- ### Tambah Produk
     - Pada tambah Produk user mengisi form yang berisikan nama produk, harga, stok, kategori, dan supermarket.
       <img width="500" alt="gif" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/5dff2672-cc35-4830-82b8-3678ed849df7">
       
- ### Daftar Kategori

    <img width="500" alt="image" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/8dae81b8-27f7-4d35-94f1-4c43813782a9">

   - Pada Tampilan Daftar Kategori berisikan sebagai berikut:
      - Form untuk menambahkan Kategori produk
      - 
        <img width="500" alt="image" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/272d1716-ceb9-425c-9b4d-d073988ef1a9">
     
     - Button 'EDIT' untuk mengubah Kategori produk
     
        <img width="500" alt="image" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/1072828b-213a-4fae-9454-9250519bf4cc">

     
     - Button 'DELETE' untuk menghapus Kategori produk
        
       <img width="500" alt="image" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/f83f42d4-c45a-4534-917e-eefbff4926ad">

- ### Daftar Supermarket
    <img width="920" alt="image" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/05434a97-8777-4c01-906d-f79f7b3ec629">

   - Pada Tampilan Daftar Supermarketberisikan sebagai berikut:
     - Form untuk menambahkan Supermarket produk
     
       <img width="500" alt="image" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/37078fdc-e621-4b43-9cdc-304731b46524">

     - Button 'EDIT' untuk mengubah Supermarket produk

       <img width="500" alt="image" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/1eed31e9-7b38-45fa-8692-8f4ee6248f5d">


     - Button 'DELETE' untuk menghapus Supermarket produk
     
      <img width="500" alt="image" src="https://github.com/AnanditaKM/TP3DPBO2023C1/assets/100897554/8a516ced-a5b0-473b-97e6-2f3b7a134fca">


