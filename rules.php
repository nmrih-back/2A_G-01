<?php

function cargoLabel($role) {
    if ($role === 'administrador') return 'Administrador';
    if ($role === 'cliente') return 'Cliente';
    if ($role === 'suporte') return 'Suporte';
    return 'Usuário';
}

function getHeaderClass($role) {
    if ($role === 'administrador') return 'header_adm';
    if ($role === 'cliente' || $role === 'suporte') return 'header_mod';
    return 'header';
}
