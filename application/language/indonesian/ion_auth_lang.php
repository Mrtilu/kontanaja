<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name: Auth Lang - Indonesia
*
* Author: MC Project
*         401xdssh@gmail.com
*         @mycodingxd
*
* Location: https://401xd.com
*
* Created:  02.13.2022
*
* Description: English language file for Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']            = 'Akun berhasil dibuat';
$lang['account_creation_unsuccessful']          = 'Tidak dapat membuat akun';
$lang['account_creation_duplicate_email']       = 'Email sudah digunakan atau tidak valid';
$lang['account_creation_duplicate_identity']    = 'Identitas sudah digunakan atau tidak valid';
$lang['account_creation_missing_default_group'] = 'Grup default tidak disetel';
$lang['account_creation_invalid_default_group'] = 'Kumpulan nama grup default tidak valid';


// Password
$lang['password_change_successful']          = 'Password berhasil diubah';
$lang['password_change_unsuccessful']        = 'Tidak dapat mengubah password';
$lang['forgot_password_successful']          = 'Email pengaturan ulang password terkirim';
$lang['forgot_password_unsuccessful']        = 'Tidak dapat mengirim email tautan reset password';

// Activation
$lang['activate_successful']                 = 'Akun Diaktifkan';
$lang['activate_unsuccessful']               = 'Tidak Dapat Mengaktifkan Akun';
$lang['deactivate_successful']               = 'Akun Dinonaktifkan';
$lang['deactivate_unsuccessful']             = 'Tidak Dapat Menonaktifkan Akun';
$lang['activation_email_successful']         = 'Email Aktivasi Terkirim. Silakan periksa kotak masuk atau spam Anda';
$lang['activation_email_unsuccessful']       = 'Tidak Dapat Mengirim Email Aktivasi';
$lang['deactivate_current_user_unsuccessful']= 'Anda tidak dapat menonaktifkan diri sendiri.';

// Login / Logout
$lang['login_successful']                    = 'Berhasil Masuk';
$lang['login_unsuccessful']                  = 'Incorrect Login';
$lang['login_unsuccessful_not_active']       = 'Akun tidak aktif';
$lang['login_timeout']                       = 'Dikunci Sementara. Coba lagi nanti.';
$lang['logout_successful']                   = 'Berhasil Logout';

// Account Changes
$lang['update_successful']                   = 'Informasi Akun Berhasil Diperbarui';
$lang['update_unsuccessful']                 = 'Tidak Dapat Memperbarui Informasi Akun';
$lang['delete_successful']                   = 'Pengguna Dihapus';
$lang['delete_unsuccessful']                 = 'Tidak Dapat Menghapus Pengguna';

// Groups
$lang['group_creation_successful']           = 'Grup Berhasil dibuat';
$lang['group_already_exists']                = 'Nama grup sudah diambil';
$lang['group_update_successful']             = 'Detail grup diperbarui';
$lang['group_delete_successful']             = 'Grup dihapus';
$lang['group_delete_unsuccessful']           = 'Tidak dapat menghapus grup';
$lang['group_delete_notallowed']             = 'Tidak dapat menghapus grup administrator';
$lang['group_name_required']                 = 'Nama grup wajib diisi';
$lang['group_name_admin_not_alter']          = 'Nama grup admin tidak dapat diubah';

// Activation Email
$lang['email_activation_subject']            = 'Aktivasi Akun';
$lang['email_activate_heading']              = 'Aktifkan akun untuk %s';
$lang['email_activate_subheading']           = 'Silahkan klik link ini untuk %s.';
$lang['email_activate_link']                 = 'Aktivasi akun anda';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Reset Password';
$lang['email_forgot_password_heading']       = 'Reset password untuk %s';
$lang['email_forgot_password_subheading']    = 'Silahkan klik link ini untuk %s.';
$lang['email_forgot_password_link']          = 'Mereset password Anda';

