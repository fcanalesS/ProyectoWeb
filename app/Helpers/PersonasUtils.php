<?php

namespace App\Helpers;


class PersonasUtils
{
    public static function Rut ($num, $dig_veri)
    {
        return $num .'-'. $dig_veri;
    }

    public static function Nombres ($p_nombre, $s_nombre)
    {
        return $p_nombre .' '. $s_nombre;
    }

    public static function Apellidos ($p_apellido, $s_apellido)
    {
        return $p_apellido .' '. $s_apellido;
    }

    public static function separaNombres ($nombres)
    {
        $n = explode(" ", $nombres);

        return $n;
    }

    public static function separaApellidos ($apellidos)
    {
        $a = explode(" ", $apellidos);

        return $a;
    }

}