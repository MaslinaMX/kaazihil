<!-- WhatsApp Floating Button -->
<div class="whatsapp-float">
    <a href="https://wa.me/5219842767319?text=Hola%20Hotel%20Kaazihil,%20me%20gustaría%20obtener%20más%20información"
       target="_blank"
       rel="noopener noreferrer"
       title="Contacto por WhatsApp">
        <i class="fa fa-whatsapp"></i>
    </a>
</div>

<style>
    .whatsapp-float {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 999;
        animation: bounce 2s infinite;
    }

    .whatsapp-float a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #25d366 0%, #20ba5a 100%);
        color: white;
        border-radius: 50%;
        font-size: 30px;
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .whatsapp-float a:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        background: linear-gradient(135deg, #20ba5a 0%, #1aa84f 100%);
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-10px);
        }

        60% {
            transform: translateY(-5px);
        }
    }

    /* Responsive */
    @media only screen and (max-width: 768px) {
        .whatsapp-float {
            bottom: 20px;
            right: 20px;
        }

        .whatsapp-float a {
            font-size: 28px;
        }
    }

    @media only screen and (max-width: 480px) {
        .whatsapp-float {
            bottom: 15px;
            right: 15px;
        }

        .whatsapp-float a {
            font-size: 24px;
        }
    }
</style>
