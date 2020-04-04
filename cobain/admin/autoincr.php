<?php
 
// fungsi ini untuk menghasilkan autonumber bertipe string
// terdapat tiga parameter yang dibutuhkan untuk menggunakan fungsi ini
// $id_terakhir adalah kode terakhir dari database ex: KNS0015
// $panjang_kode adalah panjang karakter string pada kode
//               pada KNS0015 nilai $panjang_kode = 3
// $panjang_angka adalah panjang karakter angka pada kode
//               pada KNS0015 nilai $panjang_angka = 4
 
function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {
 
    // mengambil nilai kode ex: KNS0015 hasil KNS
    $kode = substr($id_terakhir, 0, $panjang_kode);
 
    // mengambil nilai angka
    // ex: KNS0015 hasilnya 0015
    $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
 
    // menambahkan nilai angka dengan 1
    // kemudian memberikan string 0 agar panjang string angka menjadi 4
    // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
    // sehingga menjadi 0006
    $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
 
    // menggabungkan kode dengan nilang angka baru
    $id_baru = $kode.$angka_baru;
 
    return $id_baru;
}
// contoh penggunaan kode
// echo $pos['kd_terbit'];
// echo '<br/>';
// echo autonumber($pos['kd_terbit'], 3, 4); // hasil KNS0010
// echo '<br/>';
 
// echo autonumber('D001', 1, 3); // hasil D002
 
?>















































































