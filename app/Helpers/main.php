<?php
if (!function_exists('nb_produit')) {
    function nb_produit($nb)
    {
        if ($nb > 1) {
            return $nb . 'produits';
        } else {
            return $nb . 'produit';
        }
    }
}
if (!function_exists('format_prix')) {
    function format_prix($prix)
    {
        return number_format($prix, 0, ' ', ' ') . '' . 'FCFA';
    }
}
