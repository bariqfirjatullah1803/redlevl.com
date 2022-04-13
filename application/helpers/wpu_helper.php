<?php
function check_access($id_product, $is_active)
{
    $ci = get_instance();

    $ci->db->where('id_product', $id_product);
    $ci->db->where('is_active', $is_active);
    $result = $ci->db->get('product');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
