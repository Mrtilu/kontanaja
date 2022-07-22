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

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Masuk';
$lang['login_subheading']      = 'Silahkan login dengan email/username dan password anda dibawah ini.';
$lang['login_identity_label']  = 'Email/Username:';
$lang['login_password_label']  = 'Password:';
$lang['login_remember_label']  = 'Ingat Saya:';
$lang['login_submit_btn']      = 'Masuk';
$lang['login_forgot_password'] = 'Lupa password Anda?';

// Index
$lang['index_heading']           = 'Users';
$lang['index_subheading']        = 'Di bawah ini adalah daftar pengguna.';
$lang['index_fname_th']          = 'Nama Depan';
$lang['index_lname_th']          = 'Nama Belakang';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Group';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Aksi';
$lang['index_active_link']       = 'Active';
$lang['index_inactive_link']     = 'Inactive';
$lang['index_create_user_link']  = 'Buat pengguna baru';
$lang['index_create_group_link'] = 'Buat grup baru';

// Deactivate User
$lang['deactivate_heading']                  = 'Nonaktifkan Pengguna';
$lang['deactivate_subheading']               = 'Apakah Anda yakin ingin menonaktifkan pengguna? \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Yes:';
$lang['deactivate_confirm_n_label']          = 'No:';
$lang['deactivate_submit_btn']               = 'Kirim';
$lang['deactivate_validation_confirm_label'] = 'konfirmasi';
$lang['deactivate_validation_user_id_label'] = 'ID pengguna';

// Create User
$lang['create_user_heading']                           = 'Buat pengguna';
$lang['create_user_subheading']                        = 'Silakan masukkan informasi pengguna di bawah ini.';
$lang['create_user_fname_label']                       = 'Nama Depan:';
$lang['create_user_lname_label']                       = 'Nama Belakang:';
$lang['create_user_company_label']                     = 'Nama Perusahaan:';
$lang['create_user_identity_label']                    = 'Identitas:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'No Telepon:';
$lang['create_user_password_label']                    = 'Password:';
$lang['create_user_password_confirm_label']            = 'Konfirmasi Password:';
$lang['create_user_submit_btn']                        = 'Buat pengguna';
$lang['create_user_validation_fname_label']            = 'Nama Depan';
$lang['create_user_validation_lname_label']            = 'Nama Belakang';
$lang['create_user_validation_identity_label']         = 'Identitas';
$lang['create_user_validation_email_label']            = 'Alamat Email';
$lang['create_user_validation_phone_label']            = 'No Telepon';
$lang['create_user_validation_company_label']          = 'Nama Perusahaan';
$lang['create_user_validation_password_label']         = 'Password';
$lang['create_user_validation_password_confirm_label'] = 'Konfirmasi Password';

// Edit User
$lang['edit_user_heading']                           = 'Edit Pengguna';
$lang['edit_user_subheading']                        = 'Silakan masukkan informasi pengguna di bawah ini.';
$lang['edit_user_fname_label']                       = 'Nama Depan:';
$lang['edit_user_lname_label']                       = 'Nama Belakang:';
$lang['edit_user_company_label']                     = 'Nama Perusahaan:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'No Telepon:';
$lang['edit_user_password_label']                    = 'Password: (jika mengubah password)';
$lang['edit_user_password_confirm_label']            = 'Konfirmasi Password: (jika mengubah password)';
$lang['edit_user_groups_heading']                    = 'Anggota grup';
$lang['edit_user_submit_btn']                        = 'Simpan Pengguna';
$lang['edit_user_validation_fname_label']            = 'Nama depan';
$lang['edit_user_validation_lname_label']            = 'Nama belakang';
$lang['edit_user_validation_email_label']            = 'Alamat Email';
$lang['edit_user_validation_phone_label']            = 'No Telepon';
$lang['edit_user_validation_company_label']          = 'Nama Perusahaan';
$lang['edit_user_validation_groups_label']           = 'Group';
$lang['edit_user_validation_password_label']         = 'Password';
$lang['edit_user_validation_password_confirm_label'] = 'Konfirmasi Password';

// Create Group
$lang['create_group_title']                  = 'Membuat Grup';
$lang['create_group_heading']                = 'Membuat Grup';
$lang['create_group_subheading']             = 'Silakan masukkan informasi grup di bawah ini.';
$lang['create_group_name_label']             = 'Nama grup:';
$lang['create_group_desc_label']             = 'Deskripsi:';
$lang['create_group_submit_btn']             = 'Buat Grup';
$lang['create_group_validation_name_label']  = 'Nama Grup';
$lang['create_group_validation_desc_label']  = 'Deskripsi';

// Edit Group
$lang['edit_group_title']                  = 'Edit Grup';
$lang['edit_group_saved']                  = 'Grup Disimpan';
$lang['edit_group_heading']                = 'Edit Grup';
$lang['edit_group_subheading']             = 'Silakan masukkan informasi grup di bawah ini.';
$lang['edit_group_name_label']             = 'Nama Grup:';
$lang['edit_group_desc_label']             = 'Deskripsi:';
$lang['edit_group_submit_btn']             = 'Simpan Grup';
$lang['edit_group_validation_name_label']  = 'Nama Grup';
$lang['edit_group_validation_desc_label']  = 'Deskripsi';

// Change Password
$lang['change_password_heading']                               = 'Ganti password';
$lang['change_password_old_password_label']                    = 'password lama:';
$lang['change_password_new_password_label']                    = 'Password baru (minimal %s karakter):';
$lang['change_password_new_password_confirm_label']            = 'Konfirmasi password baru:';
$lang['change_password_submit_btn']                            = 'Ganti';
$lang['change_password_validation_old_password_label']         = 'password lama';
$lang['change_password_validation_new_password_label']         = 'Password baru';
$lang['change_password_validation_new_password_confirm_label'] = 'Konfirmasi password baru';

// Forgot Password
$lang['forgot_password_heading']                 = 'Reset Password';
$lang['forgot_password_subheading']              = 'Harap masukkan %s Anda sehingga kami dapat mengirimkan email kepada Anda untuk mengatur ulang password Anda.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Reset';
$lang['forgot_password_validation_email_label']  = 'Alamat Email';
$lang['forgot_password_identity_label']          = 'Identitas';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Tidak ada catatan alamat email tersebut.';
$lang['forgot_password_identity_not_found']         = 'Tidak ada catatan nama pengguna tersebut.';

// Reset Password
$lang['reset_password_heading']                               = 'Ganti password';
$lang['reset_password_new_password_label']                    = 'Password baru (minimal %s karakter):';
$lang['reset_password_new_password_confirm_label']            = 'Konfirmasi password baru:';
$lang['reset_password_submit_btn']                            = 'Reset';
$lang['reset_password_validation_new_password_label']         = 'Password baru';
$lang['reset_password_validation_new_password_confirm_label'] = 'Konfirmasi password baru';
