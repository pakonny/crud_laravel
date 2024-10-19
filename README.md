
## Cara Menjalankan Aplikasi Laravel

1. setelah menjalankan semua perintah clone repo dan migrasinya
2. jalankan build front end
   
  ![npm run dev](https://github.com/user-attachments/assets/ec7c4dcb-c139-4c8e-8085-d9b5a08baf9e)

4. Buka terminal baru dan jalankan perintah untuk memulai server:
   
  ![php artisan serve](https://github.com/user-attachments/assets/c056c569-a4d2-4488-91c3-d6b6e9d65351)


5. Buka browser dan akses aplikasi pada alamat yang ditampilkan (biasanya `http://127.0.0.1:8000`). 

6. Setelah halaman Laravel default muncul, pilih login jika sudah memiliki akun atau register untuk membuat akun baru.
   
   ![logreg](https://github.com/user-attachments/assets/8ace8723-7e28-45b5-bc74-3ef2e98fad51)

7. Setelah berhasil login atau register, dashboard toko akan muncul dengan pesan "kamu telah login."
   
   ![berhasil logreg](https://github.com/user-attachments/assets/6da73659-7e2d-40a3-ad99-8c316b37b5a5)

9. Masuk ke halaman produk, di mana terdapat 3 data dummy dari seeder.
    
   ![setelah migrate dan loginreg](https://github.com/user-attachments/assets/edd40c84-c5fc-4a34-94bc-fa99ffea2d58)
   
11. Jika ingin menambah produk, klik tombol "Tambah" di pojok Kanan atas. Isi form yang muncul untuk produk baru, lalu klik "Kirim" saat selesai.
    
    ![create](https://github.com/user-attachments/assets/fdbdd06a-c642-4c43-aaf3-507dd3f7330a)
    
13. Produk berhasil ditambahkan, dan akan muncul pesan di bawah logo.
    
    ![sukses tambah](https://github.com/user-attachments/assets/e99c59eb-84ad-4f04-8740-bbb84a8f35cb)

15. Untuk mengedit produk, tekan tombol "Edit" di bawah produk, ubah data sesuai keinginan, lalu klik "Kirim." Pesan berhasil akan muncul di bawah logo.
    
    ![edit](https://github.com/user-attachments/assets/8b9a5d1a-3f50-4829-b53b-58c160b2b711)
    ![sukses update](https://github.com/user-attachments/assets/5883bc24-a2e5-40c9-a727-993485c65258)

17. Untuk menghapus produk, masuk ke halaman edit produk dan klik tombol "Delete" di pojok kanan atas, lalu konfirmasi penghapusan. Pesan berhasil dihapus akan muncul di bawah logo.
    
    ![delete](https://github.com/user-attachments/assets/f6715fb5-d3e8-4d45-beba-148568c8536e)
    ![konfrim delete](https://github.com/user-attachments/assets/7ec52ce7-6d9d-47d4-a911-76e9024c9e4a)
    ![sukses delete](https://github.com/user-attachments/assets/961a7d4f-9fae-40c7-aaee-c2de1d3ea5ed)

19. Anda juga dapat mencari produk dengan mengetik nama produk di input search, dan hasil pencarian akan menampilkan produk yang sesuai.
    
    ![search](https://github.com/user-attachments/assets/5b23953f-da95-4f44-ab30-336198cbcc57)

## Cara Uji Coba Aplikasi

1. Buka terminal di VSCode dan ketik perintah berikut untuk mengetes seluruh fitur aplikasi:
   
  ![test all](https://github.com/user-attachments/assets/4785ee76-5150-46e5-adf2-4a945abe0e2f)


2. Jika hanya ingin menguji fitur CRUD, jalankan perintah:
   
   ![produk tes](https://github.com/user-attachments/assets/2ea85f7b-d5ad-4a4a-a299-dbec991f3251)



