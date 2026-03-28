<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                {{-- <img src="{{ asset('img/logo-sb.jpeg') }}"
                                     alt="Kaa Zihil Hotel"
                                     height="100px" /> --}}
                                <h3 class="text-white">Hotel Káa Zihil</h3>
                            </a>
                        </div>
                        <p>En el corazón de Playa del Carmen,<br />a pasos de la 5ª Avenida y el mar.</p>
                        <div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-contact">
                        <h6>Contacto</h6>
                        <ul>
                            <li><a style="color: #aaaab3"
                                   href="tel:+5219842767319">(+52) 1 984 276 7319</a></li>
                            <li><a style="color: #aaaab3"
                                   href="mailto:hotelkaazihil2026@gmail.com">hotelkaazihil2026@gmail.com</a></li>
                            <li>Calle 1 Sur Bis entre Av. 5 y 10, Centro, 77710, Playa del Carmen, Quintana Roo, México
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-newslatter">
                        <h6>Mantente al día</h6>
                        <p>Recibe guías, tips y ofertas exclusivas para tu próxima visita.</p>
                        <form action="#"
                              class="fn-form">
                            <input type="text"
                                   placeholder="Tu correo electrónico" />
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <ul>
                        <li><a href="{{ route('contact') }}">Contacto</a></li>
                        <li><a href="{{ route('condiciones') }}">Términos de uso</a></li>
                    </ul>
                </div>
                <div class="col-lg-7">
                    <div class="co-text">
                        <p>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Káa Zihil Hotel. Todos los derechos reservados. By <a href="https://www.instagram.com/maslina.mx/"
                               style="color: #aaaab3"
                               target="_blank">Maslina</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->
