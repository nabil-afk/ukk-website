<?php

session_start();

include 'user.php';
$user = new User();
if(isset($_POST['daftarSubmit'])){
 
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['telp']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
  
        if($_POST['password'] !== $_POST['confirm_password']){
            $sesiData['status']['type'] = 'error';
            $sesiData['status']['msg'] = 'Konfirmasi password harus sama dengan password.'; 
        }else{
   
            $kondSblmnya['where'] = array('email'=>$_POST['email']);
            $kondSblmnya['return_type'] = 'count';
            $userSblmnya = $user->getRows($kondSblmnya);
            if($userSblmnya > 0){
                $sesiData['status']['type'] = 'error';
                $sesiData['status']['msg'] = 'Email sudah ada, silakan gunakan email yang lain.';
            }else{
    
                $userData = array(
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'password' => md5($_POST['password']),
                    'telp' => $_POST['telp']
                );
                $insert = $user->insert($userData);
    
                if($insert){
                    $sesiData['status']['type'] = 'sukses';
                    $sesiData['status']['msg'] = 'Anda telah berhasil didaftarkan.';
                }else{
                    $sesiData['status']['type'] = 'error';
                    $sesiData['status']['msg'] = 'Terjadi masalah, silahkan coba lagi.';
                }
            }
        }
    }else{
        $sesiData['status']['type'] = 'error';
        $sesiData['status']['msg'] = 'Isi Semua Bidang.'; 
    }
 
    $_SESSION['sesiData'] = $sesiData;
    $redirectURL = ($sesiData['status']['type'] == 'sukses')?'indexa.php':'daftara.php';
 
    header("Location:$redirectURL");
}elseif(isset($_POST['loginSubmit'])){
    
    if(!empty($_POST['email']) && !empty($_POST['password'])){
  
        $kondisi['where'] = array(
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'status' => '1'
        );
        $kondisi['return_type'] = 'single';
        $userData = $user->getRows($kondisi);
  
        if($userData){
            $sesiData['userLoggedIn'] = TRUE;
            $sesiData['userID'] = $userData['id'];
            $sesiData['status']['type'] = 'sukses';
            $sesiData['status']['msg'] = 'indexa.php';
        }else{
            $sesiData['status']['type'] = 'error';
            $sesiData['status']['msg'] = 'Email atau password salah, silahkan coba lagi.'; 
        }
    }else{
        $sesiData['status']['type'] = 'error';
        $sesiData['status']['msg'] = 'Masukkan email and password.'; 
    }
 
    $_SESSION['sesiData'] = $sesiData;
 
    header("Location:indexa.php");
}elseif(!empty($_REQUEST['logoutSubmit'])){
 
    unset($_SESSION['sesiData']);
    session_destroy();
 
    $sesiData['status']['type'] = 'sukses';
    $sesiData['status']['msg'] = 'Anda telah berhasil logout dari akun Anda.';
    $_SESSION['sesiData'] = $sesiData;
 
    header("Location:indexa.php");
}else{
 
    header("Location:indexa.php");
}