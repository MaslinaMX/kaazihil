# Guía rápida para modificar los precios de habitaciones

Los precios de las habitaciones se controlan desde el archivo JSON:

- `resources/data/room-prices.json`

## Archivo de control

```json
{
    "deluxe_room": 1000,
    "deluxe_double_room": 1200,
    "deluxe_suite_jacuzzi": 2200
}
```

## Cómo cambiar un precio

1. Abre `resources/data/room-prices.json`
2. Modifica el valor numérico de la habitación que quieras cambiar
3. Guarda el archivo
4. La vista mostrará el nuevo precio automáticamente

## Habitaciones disponibles

- `deluxe_room`
- `deluxe_double_room`
- `deluxe_suite_jacuzzi`

## Dónde se usan

Las vistas que leen estos precios son:

- `resources/views/layouts/sections/rooms.blade.php`
- `resources/views/rooms/index.blade.php`

## Importante

No hace falta editar esas vistas para cambiar el precio. Solo edita el JSON.
