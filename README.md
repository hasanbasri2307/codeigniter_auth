# codeigniter_auth

modul authentication ini dibuat pada codeigniter versi 3.1.2 
fungsi modul ini adalah untuk melakukan autentikasi user.

cara install : 
1. copy file application/config/auth_config.php
2. copy file application/core/MY_Model.php
3. copy file application/libraries/Auth.php
4. copy file application/models/Auth_model.php
5. ubah isi config pada auth_config.php (sesuaikan dengan kebutuhan dan database anda).

method pada library Auth.php : 
1. login($username,$password) --> method ini digunakan untuk login pada library Auth.php
2. logout() --> method ini digunakan untuk logout
3. getUserInfo() --> method ini digunakan untuk mengambil info user yang sedang login.

load library pada controller : 
$this->load->library('auth')
