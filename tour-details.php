<?php 
// Establecer página actual para el menú activo
$current_page = 'tours';

include __DIR__ . '/header.php'; 

// Obtener ID de la URL en formato /tour-details/1
$requestUri = $_SERVER['REQUEST_URI'];
if (preg_match('#/tour-details/(\d+)#', $requestUri, $matches)) {
    $id = (int)$matches[1];
} else {
    $id = 1; // Default
}

// Carga tours desde JSON externo para edición fácil
$toursJsonPath = __DIR__ . '/assets/data/tours.json';
$tours = [];

if (is_readable($toursJsonPath)) {
    $json = file_get_contents($toursJsonPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $tours = $decoded;
    }
}

$tour = $tours[$id] ?? reset($tours) ?: [];

// Defaults para evitar avisos si faltan campos
$tour += [
    'title' => 'Tour no disponible',
    'price' => 0,
    'old_price' => 0,
    'price_unit' => 'persona',
    'duration' => '',
    'images' => ['', '', '', ''],
    'overview' => '',
    'includes' => [],
    'excludes' => [],
    'highlights' => [],
    'itinerary' => [],
    'faqs' => [],
];

// Normaliza para evitar avisos si falta algún campo
$tourIncludes   = $tour['includes']   ?? [];
$tourExcludes   = $tour['excludes']   ?? [];
$tourHighlights = $tour['highlights'] ?? [];
$tourItinerary  = $tour['itinerary']  ?? [];
$tourFaqs       = $tour['faqs']       ?? [];
$priceUnit      = $tour['price_unit'] ?? 'persona';

// Helpers para banderas rápidas en UI
$hasTransport = array_reduce($tourIncludes, function ($carry, $item) {
    return $carry || stripos($item, 'transport') !== false;
}, false);
$hasMeals = array_reduce($tourIncludes, function ($carry, $item) {
    return $carry || stripos($item, 'desayuno') !== false || stripos($item, 'comida') !== false;
}, false);
$tourType = stripos($tour['title'], 'globo') !== false ? 'Globo Aerostático' : 'Cultural';
?>

    <!-- breadcrumb area start -->
    <!-- rts breadcrumb area start -->
    <div class="rts-breadcrumb-area one" data-bg-src="assets/images/breadcrumb/piramides-contact.jpg" style="background-image: url('assets/images/breadcrumb/piramides-contact.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
        <div class="container h-100">
            <div class="breadcrumb-area-wrapper">
                <div class="nav-bread-crumb">
                    <a href="./">Inicio</a>
                    <span><i class="fa-regular fa-chevron-right"></i></span>
                    <a href="tours">Tours</a>
                    <span><i class="fa-regular fa-chevron-right"></i></span>
                    <a href="#" class="current"><?php echo htmlspecialchars($tour['title']); ?></a>
                </div>
                <h1 class="title"><?php echo mb_strtoupper(htmlspecialchars($tour['title']), 'UTF-8'); ?></h1>
            </div>
        </div>
    </div>
    <!-- rts breadcrumb area end -->
    <!-- breadcrumb area end -->

    <div class="rts-tour-details-area pt--60 rts-section-gapBottom bg-white">
        <div class="container">
            <div class="top-image-area">
                <div class="row g-3">
                    <div class="col-lg-6">
                        <div class="image image-transform radius-10 overflow-hidden" style="height: 409px;">
                            <img class="hover-image" src="<?php echo $tour['images'][0]; ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image image-transform radius-10 overflow-hidden mb-3" style="height: 198px;">
                            <img class="hover-image" src="<?php echo $tour['images'][1]; ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="row g-3">
                            <div class="col-4">
                                <div class="image image-transform radius-10 overflow-hidden" style="height: 198px;">
                                    <img class="hover-image" src="<?php echo $tour['images'][2]; ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="image image-transform radius-10 overflow-hidden" style="height: 198px;">
                                    <img class="hover-image" src="<?php echo $tour['images'][3]; ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="image image-transform radius-10 overflow-hidden" style="height: 198px;">
                                    <img class="hover-image" src="<?php echo $tour['images'][4]; ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-content-area g-5 mt--50">
                <div class="left">
                    <div class="tour-details-wrapper content-box radius-10 border overflow-hidden">
                        <div class="tour-content">
                            <div class="left-content">
                                <h4 class="title"><?php echo $tour['title']; ?></h4>
                                <ul class="meta-area">
                                    <li><i class="fa-solid fa-star-sharp"></i> 5 (10 reseñas)</li>
                                    <li><i class="fa-regular fa-location-dot"></i> Teotihuacan</li>
                                </ul>
                            </div>
                            <div class="right-content">
                                <div class="day-left">
                                    <h4><?php echo $tour['price']; ?></h4>
                                    <p>MXN/<?php echo $priceUnit; ?></p>
                                </div>
                            </div>
                        </div>
                        <ul class="feature-list-area">
                            <li>
                                <div class="icon"><img src="assets/images/trip/icon/03.svg" alt=""></div>
                                <div class="text">
                                    <p>Transporte</p>
                                    <h6><?php echo $hasTransport ? 'Incluido' : 'No incluido'; ?></h6>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="assets/images/trip/icon/04.svg" alt=""></div>
                                <div class="text">
                                    <p>Comidas</p>
                                    <h6><?php echo $hasMeals ? 'Incluido' : 'No incluido'; ?></h6>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="assets/images/trip/icon/05.svg" alt=""></div>
                                <div class="text">
                                    <p>Guía</p>
                                    <h6>Certificado Español/Ingles</h6>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="assets/images/trip/icon/06.svg" alt=""></div>
                                <div class="text">
                                    <p>Duración</p>
                                    <h6><?php echo $tour['duration']; ?></h6>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="assets/images/trip/icon/07.svg" alt=""></div>
                                <div class="text">
                                    <p>Tipo</p>
                                    <h6><?php echo $tourType; ?></h6>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="assets/images/trip/icon/08.svg" alt=""></div>
                                <div class="text">
                                    <p>Edad mínima</p>
                                    <h6>6 años</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="content-box tour-details-tab-area radius-10 border overflow-hidden">
                        <ul class="nav nav-tabs border-bottom" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                                    Resumen
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="itinerary-tab" data-bs-toggle="tab" data-bs-target="#itinerary" type="button" role="tab" aria-controls="itinerary" aria-selected="false">
                                    Itinerario
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cost-tab" data-bs-toggle="tab" data-bs-target="#cost" type="button" role="tab" aria-controls="cost" aria-selected="false">
                                    Costo
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false">
                                    FAQs
                                </button>
                            </li>
                        </ul>
                        <div class="tour-details-tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="tab-content-inner">
                                    <div class="overview-area mb--60">
                                        <h5 class="title mb--15">Resumen</h5>
                                        <p class="desc"><?php echo $tour['overview']; ?></p>
                                    </div>
                                    <div class="highlight-area">
                                        <h5 class="title">Destacados:</h5>
                                        <ul>
                                            <?php foreach ($tourHighlights as $highlight): ?>
                                                <li><i class="fa-regular fa-check"></i> <?php echo $highlight; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cost" role="tabpanel" aria-labelledby="cost-tab">
                                <div class="tab-content-inner">
                                    <div class="highlight-area">
                                        <h5 class="title">Desglose del Costo</h5>
                                        <p class="desc mb--10">Precio actual: $<?php echo $tour['price']; ?> MXN / persona (antes $<?php echo $tour['old_price']; ?>). Ahorra $<?php echo $tour['old_price'] - $tour['price']; ?> por persona.</p>
                                        <p class="desc mb--20">Duración: <?php echo $tour['duration']; ?> · Tipo: <?php echo $tourType; ?></p>
                                        <ul class="mb--30">
                                            <li class="tag mb--10 c-p">Incluido:</li>
                                            <?php foreach ($tourIncludes as $include): ?>
                                                <li><i class="fa-regular fa-check"></i> <?php echo $include; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <ul>
                                            <li class="tag mb--10 c-p">No Incluido:</li>
                                            <?php foreach ($tourExcludes as $exclude): ?>
                                                <li><i class="fa-regular fa-check"></i> <?php echo $exclude; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                <div class="tab-content-inner">
                                    <div class="itinerary-area faq">
                                        <div class="itinerary-header">
                                            <h2>Preguntas Frecuentes</h2>
                                        </div>
                                        <div class="itinerary-list">
                                            <?php foreach ($tourFaqs as $faq): ?>
                                                <div class="itinerary-item">
                                                    <button class="itinerary-title"><span class="icon"><img src="assets/images/trip/icon/14.svg" alt=""></span> <?php echo $faq[0]; ?></button>
                                                    <div class="itinerary-content">
                                                        <p><?php echo $faq[1]; ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="itinerary" role="tabpanel" aria-labelledby="itinerary-tab">
                                <div class="tab-content-inner">
                                    <div class="highlight-area">
                                        <h5 class="title">Itinerario</h5>
                                        <p class="desc">El itinerario se adapta a clima, aforo y logística diaria. Confirma horarios y puntos de encuentro por WhatsApp antes de tu fecha: <a href="https://wa.me/525548718293?text=<?php echo urlencode('Hola, quiero confirmar el itinerario del tour ' . $tour['title']); ?>" target="_blank" rel="noopener">(55) 4871-8293</a>.</p>
                                        <p class="desc">Tiempo estimado: <?php echo $tour['duration']; ?>. Incluye las actividades listadas en “Destacados” y lo marcado como “Incluido”.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-area content-box radius-10 border overflow-hidden">
                        <h5 class="title mb--30">Envía tu consulta a través del formulario a continuación.</h5>
                        <form id="contact-form" action="send_contact.php" method="post" class="contact-form border radius-10">
                            <input type="hidden" name="tour" value="<?php echo $tour['title']; ?>">
                            <div class="input-div">
                                <div class="row g-24">
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <input type="text" name="name" placeholder="Ingresa tu nombre completo*" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <input type="email" name="email" placeholder="Ingresa tu email*" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="tel" name="phone" placeholder="Número de teléfono*" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="number" name="guests" placeholder="Número de personas*" min="1" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <textarea name="message" placeholder="Mensaje adicional"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="form-messages" class="form-messages mb--10"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <button type="submit" class="rts-btn btn-primary">Enviar Consulta</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="pricing-area content-box radius-10 border overflow-hidden mb--30">
                        <div class="discount-badge" style="background: #ff5722; color: white; padding: 5px 10px; border-radius: 5px; display: inline-block; margin-bottom: 10px;">20% OFF</div>
                        <div class="price-info" style="margin-bottom: 20px;">
                            <div style="text-decoration: line-through; color: #999;">Desde $<?php echo $tour['old_price']; ?></div>
                            <div style="font-size: 24px; font-weight: bold; color: #333;">$<?php echo $tour['price']; ?> / Adulto</div>
                            <div style="font-size: 20px; font-weight: bold; color: #333;">$<?php echo $tour['price']; ?> / Niño</div>
                        </div>
                        <ul class="features" style="list-style: none; padding: 0; margin-bottom: 20px;">
                            <li style="margin-bottom: 5px;"><i class="fa-solid fa-check" style="color: green;"></i> Mejor Precio Garantizado</li>
                            <li style="margin-bottom: 5px;"><i class="fa-solid fa-check" style="color: green;"></i> Soporte de Emergencia</li>
                            <li style="margin-bottom: 5px;"><i class="fa-solid fa-check" style="color: green;"></i> Sin Cargos de Reserva</li>
                            <li style="margin-bottom: 5px;"><i class="fa-solid fa-check" style="color: green;"></i> Guía Local Profesional</li>
                        </ul>
                        <a href="https://wa.me/525548718293?text=<?php echo urlencode('Hola, me gustaría consultar disponibilidad para el tour ' . $tour['title']); ?>" class="rts-btn btn-primary" style="width: 100%; margin-bottom: 10px; display: inline-block; text-align: center; text-decoration: none;">Verificar Disponibilidad</a>
                        <p style="text-align: center; color: #666;"><a href="https://wa.me/525548718293?text=<?php echo urlencode('Hola, necesito ayuda con la reserva del tour ' . $tour['title']); ?>" style="color: #666; text-decoration: none;">¿Necesitas ayuda con la reserva? Envíanos un Mensaje</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include __DIR__ . '/footer.php'; ?>

<!-- Google reCAPTCHA v3 -->
<script src="https://www.google.com/recaptcha/api.js?render=6LeIjDwsAAAAALJ4tgYzJkcZeO0ut5RShcdH6p9X"></script>

<script>
// Expand/collapse for itinerary and FAQ
// Accordion behavior for itinerary/FAQs to mirror template styling
document.querySelectorAll('.itinerary-item').forEach(item => {
    const title = item.querySelector('.itinerary-title');
    if (!title) return;
    title.addEventListener('click', () => {
        item.classList.toggle('active');
    });
});
    // AJAX submit with SweetAlert (no reload) for contact form in tour page
    (function() {
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('contact-form');
            if (!form) return;

            const submitBtn = form.querySelector('button[type="submit"]');
            const fields = form.querySelectorAll('input, textarea, select');
            let isSubmitting = false;

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                if (!submitBtn || isSubmitting) {
                    console.log('Ya se está enviando, ignorando...');
                    return false;
                }
                
                isSubmitting = true;
                
                // Capturar FormData PRIMERO
                const formData = new FormData(form);
                
                // Deshabilitar para UX
                submitBtn.disabled = true;
                const originalHtml = submitBtn.innerHTML;
                submitBtn.innerHTML = 'Enviando...';
                fields.forEach(el => el.disabled = true);

                // Ejecutar reCAPTCHA v3
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LeIjDwsAAAAALJ4tgYzJkcZeO0ut5RShcdH6p9X', {action: 'submit'}).then(function(token) {
                        formData.append('g-recaptcha-response', token);

                        fetch(form.action, {
                            method: 'POST',
                            body: formData
                        })
                            .then(res => res.text())
                            .then(text => {
                                const ok = text.toLowerCase().includes('exitosamente') || text.toLowerCase().includes('mensaje enviado');

                                if (window.Swal) {
                                    Swal.fire({
                                        icon: ok ? 'success' : 'error',
                                        title: ok ? '¡Mensaje enviado!' : 'Error',
                                        text: ok ? 'Tu mensaje ha sido enviado. Revisa tu correo.' : text || 'No pudimos enviar tu mensaje.',
                                        confirmButtonText: 'Aceptar'
                                    });
                                }

                                if (ok) form.reset();
                            })
                            .catch(() => {
                                if (window.Swal) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Hubo un problema al enviar el mensaje.',
                                        confirmButtonText: 'Aceptar'
                                    });
                                }
                            })
                            .finally(() => {
                                isSubmitting = false;
                                if (submitBtn) {
                                    submitBtn.disabled = false;
                                    submitBtn.innerHTML = originalHtml;
                                }
                                fields.forEach(el => el.disabled = false);
                            });
                    }).catch(function(error) {
                        isSubmitting = false;
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalHtml;
                        }
                        fields.forEach(el => el.disabled = false);
                        if (window.Swal) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error de verificación de seguridad. Por favor intenta nuevamente.',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    });
                });
                
                return false;
            }, true);
        });
    })();
</script>