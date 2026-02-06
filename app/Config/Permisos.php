<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Permisos extends BaseConfig
{
    public array $modulos = [

        'Finanzas' => [
            'ver_transacciones',
            'ver_cajas',
            'crear_caja',
            'editar_caja',
            'eliminar_caja',
            'hacer_corte',
            'ver_cuentas',
            'crear_cuenta',
            'ver_historicos_de_caja',
            'registrar_gasto',
            'registrar_transferencia',
        ],

        'Reportes' => [
            'ver_reportes',
        ],

        'Ajustes del sistema' => [
            'ver_configuracion',
            'ver_sucursales',
            'ver_almacenamiento',
            'ver_bitacora',
            'ajustes_multimedia',
        ],

        'Gestión de usuarios' => [
            'ver_usuarios',
            'crear_usuarios',
            'editar_usuarios',
            'eliminar_usuarios',
            'ver_roles',
            'editar_roles',
            'eliminar_roles',
            'crear_roles',
            'asignar_permisos',
        ],
    ];
}
