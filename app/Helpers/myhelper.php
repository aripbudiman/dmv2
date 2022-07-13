<?php
function rupiah($angka)
{
    $rupiah = "" . number_format($angka, 0, ',', '.');
    return $rupiah;
}
function rupiahRp($angka)
{
    $rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $rupiah;
}
