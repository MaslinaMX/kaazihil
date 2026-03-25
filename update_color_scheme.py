#!/usr/bin/env python3

# Leer el archivo CSS
with open('public/css/style.css', 'r') as f:
    content = f.read()

# Nueva paleta:
# green (#13662e) = PRIMARY - botones, títulos, encabezados
# orange (#f6a339) = ACCENTS - subrayados, detalles
# turquoise (#2399a2) = SECONDARY/LINKS - elementos discretos

# Reemplazos estratégicos:
replacements = [
    # Primary buttons y elementos principales
    ('.primary-btn:after', '#f6a339', '#f6a339'),  # Subrayado del botón mantiene naranja
    ('.top-nav .tn-right .bk-btn { ... background:', '#f6a339', '#13662e'),
    ('.section-title span { ... color:', '#f6a339', '#f6a339'),  # Títulos en orange (accent)
    ('.service-item:hover { background:', '#f6a339', '#13662e'),
    ('Hotel buttons and forms', '#f6a339', '#13662e'),
]

# Patrones más específicos usando regex
import re

# 1. Botones principales (.bk-btn, .primary-btn, .btn) → verde
patterns_to_green = [
    (r'\.top-nav .tn-right .bk-btn \{[^}]*background: #f6a339', 
     lambda m: m.group(0).replace('#f6a339', '#13662e')),
    (r'\.booking-form form button \{[^}]*border: 1px solid #f6a339',
     lambda m: m.group(0).replace('#f6a339', '#13662e')),
    (r'\.service-item:hover \{[^}]*background: #f6a339',
     lambda m: m.group(0).replace('#f6a339', '#13662e')),
]

# 2. Links y elementos secundarios → turquoise
patterns_to_turquoise = [
    (r'\.offcanvas-menu-wrapper .slicknav_nav ul li a:hover \{[^}]*color: #f6a339',
     lambda m: m.group(0).replace('#f6a339', '#2399a2')),
]

# Hacer reemplazos globales simples primero
# Primary buttons y elementos principales → verde
original = content

# Estrategia: reemplazar #f6a339 por #13662e en contextos de botones/elementos principales
# Y mantener la jerarquía

# Para simplificar, vamos a hacer reemplazos contextuales:
# 1. En hovers de elementos - verde
# 2. En botones principales - verde
# 3. En links - turquoise
# 4. En acentos/detalles - mantener naranja o turquoise

# Contadores
count_green = 0
count_turquoise = 0
count_orange_kept = 0

# Vamos a reemplazar algunos #f6a339 específicos:
# Botones hover → verde
replacements_dict = {
    '.top-nav .tn-right .bk-btn': '#13662e',  # Botón reserva - verde
    '.booking-form form button': '#13662e',     # Botón formulario - verde
    '.contact-form button': '#13662e',          # Botón contacto - verde
    '.room-booking form button': '#13662e',    # Botón habitación - verde
    '.review-add .ra-form button': '#13662e',  # Botón review - verde
    '.blog-details-text .leave-comment .comment-form button': '#13662e',
}

# Hacer algunos reemplazos contextuales simples
content = content.replace(
    '.top-nav .tn-right .bk-btn {\n\tdisplay: inline-block;\n\tfont-size: 13px;\n\tfont-weight: 700;\n\tpadding: 16px 28px 15px;\n\tbackground: #f6a339;',
    '.top-nav .tn-right .bk-btn {\n\tdisplay: inline-block;\n\tfont-size: 13px;\n\tfont-weight: 700;\n\tpadding: 16px 28px 15px;\n\tbackground: #13662e;'
)

# Botones resto
content = content.replace(
    '.booking-form form button {\n\tdisplay: block;\n\tfont-size: 14px;\n\ttext-transform: uppercase;\n\tborder: 1px solid #f6a339;\n\tborder-radius: 2px;\n\tcolor: #f6a339;',
    '.booking-form form button {\n\tdisplay: block;\n\tfont-size: 14px;\n\ttext-transform: uppercase;\n\tborder: 1px solid #13662e;\n\tborder-radius: 2px;\n\tcolor: #13662e;'
)

content = content.replace(
    '.contact-form button {\n\tfont-size: 13px;\n\tfont-weight: 700;\n\ttext-transform: uppercase;\n\tcolor: #ffffff;\n\tletter-spacing: 2px;\n\tbackground: #f6a339;',
    '.contact-form button {\n\tfont-size: 13px;\n\tfont-weight: 700;\n\ttext-transform: uppercase;\n\tcolor: #ffffff;\n\tletter-spacing: 2px;\n\tbackground: #13662e;'
)

content = content.replace(
    '.room-booking form button {\n\tdisplay: block;\n\tfont-size: 14px;\n\ttext-transform: uppercase;\n\tborder: 1px solid #f6a339;\n\tborder-radius: 2px;\n\tcolor: #f6a339;',
    '.room-booking form button {\n\tdisplay: block;\n\tfont-size: 14px;\n\ttext-transform: uppercase;\n\tborder: 1px solid #13662e;\n\tborder-radius: 2px;\n\tcolor: #13662e;'
)

content = content.replace(
    '.review-add .ra-form button {\n\tfont-size: 13px;\n\tfont-weight: 700;\n\ttext-transform: uppercase;\n\tcolor: #ffffff;\n\tletter-spacing: 2px;\n\tbackground: #f6a339;',
    '.review-add .ra-form button {\n\tfont-size: 13px;\n\tfont-weight: 700;\n\ttext-transform: uppercase;\n\tcolor: #ffffff;\n\tletter-spacing: 2px;\n\tbackground: #13662e;'
)

content = content.replace(
    '.blog-details-text .leave-comment .comment-form button {\n\tfont-size: 13px;\n\tfont-weight: 700;\n\ttext-transform: uppercase;\n\tcolor: #ffffff;\n\tletter-spacing: 2px;\n\tbackground: #f6a339;',
    '.blog-details-text .leave-comment .comment-form button {\n\tfont-size: 13px;\n\tfont-weight: 700;\n\ttext-transform: uppercase;\n\tcolor: #ffffff;\n\tletter-spacing: 2px;\n\tbackground: #13662e;'
)

# Service items hover → verde
content = content.replace(
    '.service-item:hover {\n\tbackground: #f6a339;',
    '.service-item:hover {\n\tbackground: #13662e;'
)

# Hovers en room pagination → verde
content = content.replace(
    '.room-pagination a:hover {\n\tbackground: #f6a339;',
    '.room-pagination a:hover {\n\tbackground: #13662e;'
)

# Blog items hover → verde  
content = content.replace(
    '.blog-details-text .tag-share .tags a:hover {\n\tcolor: #ffffff;\n\tbackground: #f6a339;',
    '.blog-details-text .tag-share .tags a:hover {\n\tcolor: #ffffff;\n\tbackground: #13662e;'
)

# Comment hover → verde
content = content.replace(
    '.blog-details-text .comment-option .single-comment-item .sc-text a:hover {\n\tbackground: #f6a339;\n\tcolor: #ffffff;\n\tborder-color: #f6a339;',
    '.blog-details-text .comment-option .single-comment-item .sc-text a:hover {\n\tbackground: #13662e;\n\tcolor: #ffffff;\n\tborder-color: #13662e;'
)

# Room details action button → verde
content = content.replace(
    '.room-details-item .rd-text .rd-title .rdt-right a {\n\tdisplay: inline-block;\n\tcolor: #ffffff;\n\tfont-size: 13px;\n\ttext-transform: uppercase;\n\tfont-weight: 700;\n\tbackground: #f6a339;',
    '.room-details-item .rd-text .rd-title .rdt-right a {\n\tdisplay: inline-block;\n\tcolor: #ffffff;\n\tfont-size: 13px;\n\ttext-transform: uppercase;\n\tfont-weight: 700;\n\tbackground: #13662e;'
)

# Footer newsletter button → verde
content = content.replace(
    '.footer-section .footer-text .ft-newslatter .fn-form button {\n\tposition: absolute;\n\tright: 0;\n\ttop: 0;\n\tfont-size: 16px;\n\tbackground: #f6a339;',
    '.footer-section .footer-text .ft-newslatter .fn-form button {\n\tposition: absolute;\n\tright: 0;\n\ttop: 0;\n\tfont-size: 16px;\n\tbackground: #13662e;'
)

# Footer link hover → turquoise (más discreto)
content = content.replace(
    '.footer-section .footer-text .ft-about .fa-social a:hover {\n\tbackground: #f6a339;\n\tborder-color: #f6a339;',
    '.footer-section .footer-text .ft-about .fa-social a:hover {\n\tbackground: #2399a2;\n\tborder-color: #2399a2;'
)

# Offcanvas buttons
content = content.replace(
    '.offcanvas-menu-wrapper .header-configure-area .bk-btn {\n\tdisplay: inline-block;\n\tfont-size: 13px;\n\tfont-weight: 700;\n\tpadding: 16px 28px 15px;\n\tbackground: #f6a339;',
    '.offcanvas-menu-wrapper .header-configure-area .bk-btn {\n\tdisplay: inline-block;\n\tfont-size: 13px;\n\tfont-weight: 700;\n\tpadding: 16px 28px 15px;\n\tbackground: #13662e;'
)

# Offcanvas nav link hover → turquoise
content = content.replace(
    '.offcanvas-menu-wrapper .slicknav_menu .slicknav_nav ul li a:hover {\n\tborder-radius: 0;\n\tbackground: transparent;\n\tcolor: #f6a339;',
    '.offcanvas-menu-wrapper .slicknav_menu .slicknav_nav ul li a:hover {\n\tborder-radius: 0;\n\tbackground: transparent;\n\tcolor: #2399a2;'
)

# Row hover
content = content.replace(
    '.offcanvas-menu-wrapper .slicknav_menu .slicknav_nav .slicknav_row:hover a {\n\tcolor: #f6a339;\n}\n\t.offcanvas-menu-wrapper .slicknav_menu .slicknav_nav .slicknav_row:hover span {\n\tcolor: #f6a339;',
    '.offcanvas-menu-wrapper .slicknav_menu .slicknav_nav .slicknav_row:hover a {\n\tcolor: #2399a2;\n}\n\t.offcanvas-menu-wrapper .slicknav_menu .slicknav_nav .slicknav_row:hover span {\n\tcolor: #2399a2;'
)

# Contar cambios
changes = len([c for c in [original.count('#13662e'), content.count('#13662e')] if c > 0])

with open('public/css/style.css', 'w') as f:
    f.write(content)

print("✅ Esquema de colores actualizado:")
print(f"  🟢 Verde (#13662e) - Elementos principales (botones, hovers)")
print(f"  🟠 Naranja (#f6a339) - Acentos y detalles")
print(f"  🔵 Turquoise (#2399a2) - Links y elementos discretos")
