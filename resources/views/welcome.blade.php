@extends('layouts.base')

@section('title', 'Kia Plaza - Automóviles usados, multimarca')

@section('content')

    <main class="main">

        <!-- Modal de Cookies -->
        <div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg"> <!-- Tamaño más grande del modal -->
                <div class="modal-content" style="background-color: #697279; color: #fff;">
                    <!-- Fondo gris oscuro y letras blancas -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="cookieModalLabel" style="color: #fff; font-weight: bold;">Centro de
                            Preferencias de Privacidad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"
                            style="filter: invert(1);"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Al visitar nuestro sitio web, podemos almacenar o recuperar información en su navegador,
                            principalmente en forma de cookies. Esta información, que puede incluir datos sobre sus
                            preferencias o su dispositivo, se utiliza para que el sitio funcione de la mejor manera y le
                            ofrezca una experiencia personalizada. Aunque esta información no suele identificarlo
                            directamente, puede brindarle un contenido más relevante.
                        </p>
                        <p>
                            Respetamos su derecho a la privacidad y le permitimos decidir sobre el uso de cookies.
                        </p>
                        <a href="link-a-politica" style="color: #ffa500;">Más información en nuestro aviso de
                            privacidad</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Aceptar</button>
                        <button type="button" class="btn btn-secondary">Rechazar</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

                <!-- Primer elemento del carrusel -->
                <div class="carousel-item active">
                    <img src="assets/img/hero-carousel/hero.jpeg" alt="" class="carousel-image">
                    <div class="overlay"></div>
                    <div class="container">
                        <h2>KIA PLAZA USADOS</h2>
                        <p>Aquí encontrarás toda la información sobre nuestra variedad de vehículos usados, <br>
                            especialmente seleccionados para ti. Ya sea para tus traslados diarios, <br>
                            para disfrutar en familia o para impulsar tu negocio, tenemos el auto perfecto <br>
                            que se adapta a tus necesidades. </p>
                        <a href="#about" class="btn-get-started">Inventario</a>
                    </div>
                </div><!-- Fin del primer elemento del carrusel -->

                <!-- Segundo elemento del carrusel -->
                <div class="carousel-item">
                    <img src="assets/img/hero-carousel/slider.jpg" alt="" class="carousel-image">
                    <div class="overlay"></div>
                    <div class="container">
                        <h2>COMPRAMOS TU USADO</h2>
                        <p>En Kia Plaza te aseguramos la mejor oferta para tu vehículo usado, <br>
                            respaldada por un proceso de peritaje exhaustivo. Valoramos tu vehículo de manera justa, <br>
                            considerando su estado y el mercado actual.</p>
                        <a href="#about" class="btn-get-started">Saber Más</a>
                    </div>
                </div><!-- Fin del segundo elemento del carrusel -->


                <!-- Controles de navegación -->
                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>



            </div>
        </section>



        <div class="container my-5">
            <!-- Botones para cambiar entre las secciones -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <div class="btn-group" role="group" aria-label="Tipo de Vehículo y Marcas">
                        <button class="btn btn-primary active" id="vehiculoBtn"
                            onclick="toggleSection('categorias', 'vehiculoBtn', 'marcaBtn')">
                            Tipo de Vehículo
                        </button>
                        <button class="btn btn-light" id="marcaBtn"
                            onclick="toggleSection('marcas', 'marcaBtn', 'vehiculoBtn')">
                            Marcas
                        </button>
                    </div>
                </div>
            </div>

            <div id="marcas" class="row justify-content-center">
                @foreach ($marcas->chunk(8) as $index => $marcaChunk)
                    <div class="col-12">
                        <div class="row justify-content-center">
                            @foreach ($marcaChunk as $marca)
                                <!-- Verificar si el nombre es 'zz' y cambiarlo por 'saber-mas' -->
                                @if ($marca['name'] === 'zz')
                                    <?php $marca['name'] = 'saber-mas'; ?>
                                @endif

                                <!-- Mostrar los elementos de marcas con la clase 'brand-link' y 'brand-img' para aplicar el estilo gris -->
                                <div class="col-3 col-sm-2 col-md-1 d-flex justify-content-center align-items-center mb-4">
                                    <a href="#" title="{{ $marca['name'] }}" class="brand-link">
                                        <div class="brand-icon">
                                            <!-- SVG en línea -->
                                            @if (strpos($marca['file'], '.svg') !== false)
                                                {!! file_get_contents(public_path('assets/img/marcas/' . $marca['file'])) !!}
                                            @else
                                                <img src="{{ asset('assets/img/marcas/' . $marca['file']) }}"
                                                    alt="{{ $marca['name'] }}" class="brand-img">
                                            @endif
                                        </div>
                                        <div class="brand-name">{{ ucfirst($marca['name']) }}</div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>





            <!-- Categorías (Ocultas por defecto) -->
            <div id="categorias" class="row justify-content-center" style="display:none;">
                @foreach ($categorias->chunk(8) as $categoriaChunk)
                    <div class="col-12">
                        <div class="row justify-content-center">
                            @foreach ($categoriaChunk as $categoria)
                                <div class="col-3 col-sm-2 col-md-1 d-flex justify-content-center align-items-center mb-4">
                                    <a href="#" title="{{ $categoria['name'] }}" class="brand-link">
                                        <div class="brand-icon">
                                            <img src="{{ asset('assets/img/categorias/' . $categoria['file']) }}"
                                                alt="{{ $categoria['name'] }}" class="brand-img">
                                        </div>
                                        <div class="brand-name">{{ ucfirst($categoria['name']) }}</div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>








        <section id="doctors" class="doctors section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h3 class="destacados">Vehiculos destacados</h3>

            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/coches/jacelectrico.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>JAC E1</h4>
                                <strong>$67.900.000</strong>
                                <p>2023 | 5 Kms</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn-interesado">
                                    Estoy interesado
                                </button>

                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="" class="btn-credito">
                                    Con credito
                                </button>

                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/coches/jetour.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Anesthesiologist</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/coches/jac2.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>Cardiology</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/coches/jac.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Neurosurgeon</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

                <div class="row mt-4 justify-content-center">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <button type="submit" class="buttonKia ">
                            VER EXISTENCIAS
                        </button>
                    </div>
                </div>



            </div>

        </section>





        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section accent-background">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>In an emergency? Need help now?</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia deserunt mollit anim id est laborum.</p>
                            <a class="cta-btn" href="#appointment">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Call To Action Section -->

        <!-- About Section -->
        <section id="about" class="about section">



            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">

                    </div>
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>¡VENDENOS TU VEHÍCULO USADO Y RECIBE PAGO INMEDIATO!</h3>
                        <p class="fst-italic">
                            ¿Quieres vender tu vehículo rápidamente y sin complicaciones? ¡Nosotros te lo compramos de
                            contado! En nuestro portal, puedes vender tu carro de manera segura y recibir tu pago al
                            instante. También ofrecemos la opción de dejarlo en parte de pago si deseas adquirir un
                            vehículo nuevo o seminuevo con nosotros. ¡No pierdas esta oportunidad de obtener el mejor
                            valor por tu auto!
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Pago inmediato y seguro por tu vehículo.</span>
                            </li>
                            <li><i class="bi bi-check2-all"></i> <span>Opciones flexibles: vende o usa tu vehículo como
                                    parte de pago.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Proceso rápido y sin trámites
                                    complicados.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Te ofrecemos una valoración justa y
                                    competitiva.</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Red de compradores potenciales que facilita la
                                    venta.</span></li>
                        </ul>
                        <p>
                            No esperes más para obtener el máximo valor por tu vehículo usado. Contáctanos hoy y
                            descubre lo fácil que es vender tu auto o dejarlo en parte de pago para una nueva compra.
                            ¡Estamos aquí para ayudarte a hacer el mejor negocio!
                        </p>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->



        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>VISITA NUESTRO CONCESIONARIO</h2>

            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">

                    <!-- Contact Information -->
                    <div class="col-lg-4">
                        <div class="row gy-4">
                            <div class="col-lg-12">
                                <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Dirección</h3>
                                    <p>Autopista norte #134 A 92</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                    data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Teléfono</h3>
                                    <p>+57317 6352902</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item d-flex flex-column justify-content-center align-items-center"
                                    data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p>gerenciausados@kiamotors.com.co</p>
                                </div>
                            </div><!-- End Info Item -->
                        </div>
                    </div><!-- End Contact Information Column -->

                    <!-- Contact Form -->
                    <div class="col-lg-4">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="500">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Tu nombre"
                                        required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Tu email"
                                        required="">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Asunto"
                                        required="">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="4" placeholder="Mensaje" required=""></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Gracias pronto nos pondremos en contacto</div>
                                    <button type="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- End Contact Form Column -->

                    <!-- Map Column -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <iframe style="border:0; width: 100%; height: 370px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248.5176995662748!2d-74.0511612563704!3d4.720794485675899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f85472cc73179%3A0x50bb576725139ff3!2sKia%20Plaza!5e0!3m2!1ses!2sco!4v1731262448319!5m2!1ses!2sco"
                            frameborder="0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div><!-- End Map Column -->

                </div>
            </div>

        </section>
        <!-- /Contact Section -->

    </main>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
    @include('partials.script')

    <script>
        // Función para alternar las secciones y cambiar el estado de los botones
        function toggleSection(sectionId, activeButtonId, inactiveButtonId) {
            // Ocultar ambas secciones
            document.getElementById('categorias').style.display = 'none';
            document.getElementById('marcas').style.display = 'none';

            // Mostrar la sección correspondiente
            document.getElementById(sectionId).style.display = 'block';

            // Cambiar colores de los botones: activo en naranja y inactivo en blanco
            document.getElementById(activeButtonId).classList.add('active');
            document.getElementById(activeButtonId).classList.remove('btn-light');
            document.getElementById(activeButtonId).classList.add('btn-warning');

            document.getElementById(inactiveButtonId).classList.remove('active');
            document.getElementById(inactiveButtonId).classList.remove('btn-warning');
            document.getElementById(inactiveButtonId).classList.add('btn-light');
        }

        // Al cargar la página, mostrar la sección de "Tipo de Vehículo" y activar el botón correspondiente
        document.addEventListener("DOMContentLoaded", function() {
            toggleSection('categorias', 'vehiculoBtn', 'marcaBtn');
        });
    </script>

    <script>
        $(document).ready(function() {
            // Muestra el modal de cookies en cada carga de página
            $('#cookieModal').modal('show');

            // Escucha el clic en el botón "Aceptar"
            $('#acceptCookies').click(function() {
                // Simplemente oculta el modal sin guardar nada en localStorage
                $('#cookieModal').modal('hide');
            });
        });
    </script>

@endsection
