<?php
if (!function_exists('nb_prix')) {
    function nb_prix($nb)
    {
        if ($nb > 1000) {
            return number_format($nb, 0, ',', ' ') . 'FCFA';
            return;
        }
    }
}
