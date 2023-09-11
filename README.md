


public property yang di hasilkan class App
Menampilkan seluruh metode url
$this->requestMethod return POST GET
menampilkan segment url /login/user
$this->urlSegments




Aturan pembuatan class untuk menangani sebuah page.
1.Nama file harus dengan format (namafile)Controller.php diawali dengan huruf kecil misalnya loginController.php 
2.Nama class harus sama dengan nama file misalnya class loginController nama file juga harus loginController.php
Layout berada di folder views nama file bebas karena nanti kita yang akan menuliskanya di program misalnya login.php
lalu rendering misalkan file login.php dengan cara 
1.  `$this->renderView('namafile', $data = []);';` jadi ` $this->renderView('login',  = [])`;


    
 

