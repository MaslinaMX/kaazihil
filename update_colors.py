#!/usr/bin/env python3

# Leer el archivo CSS
with open('public/css/style.css', 'r') as f:
    content = f.read()

# Mapeo de colores antiguos a nuevos siguiendo la paleta de _variables.scss
color_map = {
    '#dfa974': '#f6a339',  # hotel-orange
    '#f5b917': '#f6a339',  # amarillo a orange principal
    '#19191a': '#000000',  # gris oscuro a black
    '#111111': '#000000',  # negro a black definido
    '#222736': '#333333',  # fondo oscuro a gris más oscuro
}

# Hacer reemplazos
original_content = content
for old_color, new_color in color_map.items():
    content = content.replace(old_color, new_color)

# Contar cuántos reemplazos se hicieron
replacements_made = 0
for old_color, new_color in color_map.items():
    count = original_content.count(old_color)
    if count > 0:
        replacements_made += count
        print(f"✓ {old_color} → {new_color}: {count} reemplazos")

# Escribir el archivo actualizado
with open('public/css/style.css', 'w') as f:
    f.write(content)

print(f"\n✅ Total de cambios realizados: {replacements_made}")
