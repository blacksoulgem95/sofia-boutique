<?php


if (!function_exists('id_equals')) {
    function id_equals($id_l, $id_r)
    {
        return ("".$id_l) === ("".$id_r);
    }
}
