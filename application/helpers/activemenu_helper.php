<?php

function activate_menu($menu)
{
$ci = get_instance();
$classname = $ci->router->fetch_class();
return $classname == $menu ? 'active' : '';
}



function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('nik')) {
        redirect('auth');
    } else {
        $level = $ci->session->userdata('level');
    }
}


function set_pesan($pesan, $tipe = true)
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('pesan', "<div class='alert alert-success'>Data User berhasil {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    } else {
        $ci->session->set_flashdata('pesan', "<div class='alert alert-danger'><strong>ERROR!</strong> {$pesan} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    }
}