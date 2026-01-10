<?php include __DIR__ . '/header.php'; ?>

    <!-- breadcrumb area start -->
    <!-- rts breadcrumb area start -->
    <div class="rts-breadcrumb-area one" data-bg-src="assets/images/breadcrumb/piramides-tours.jpg" style="background-image: url('assets/images/breadcrumb/piramides-tours.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
        <div class="container h-100">
            <div class="breadcrumb-area-wrapper">
                <div class="nav-bread-crumb">
                    <a href="./">Inicio</a>
                    <span><i class="fa-regular fa-chevron-right"></i></span>
                    <a href="#" class="current">Tours</a>
                </div>
                <h1 class="title">Nuestros Tours</h1>
            </div>
        </div>
    </div>
    <!-- rts breadcrumb area end -->
    <!-- breadcrumb area end -->

    <div class="rts-tour-area inner rts-section-gap">
        <div class="container">
            <div class="section-inner">
                <div class="row g-5">
                    <div class="col-xl-3 col-lg-4">
                        <div class="sticky-top">
                            <div class="left-sidebar-area radius-10">
                                <h2 class="title">Tours en Teotihuacan</h2>
                                <div class="price-box side-box">
                                    <h6>Precio</h6>
                                    <div class="slider-container">
                                        <!-- Range Slider -->
                                        <div class="range-slider">
                                            <div class="track"></div>
                                            <div class="range" id="range"></div>
                                            <input type="range" id="minRange" min="700" max="3799" value="700">
                                            <input type="range" id="maxRange" min="700" max="3799" value="3799">
                                        </div>

                                        <!-- Price Labels -->
                                        <div class="price-labels">
                                            <span id="minPrice">$700</span>
                                            <span id="maxPrice">$3799</span>
                                        </div>
                                    </div>
                                    <span class="cross"><i class="fa-regular fa-chevron-up"></i></span>
                                </div>
                                <div class="duration side-box">
                                    <h6>Duración</h6>
                                    <ul class="checkbox-list">
                                        <li class="checkbox-item">
                                            <label class="checkbox-label">
                                                <input type="checkbox" checked class="duration-filter" value="1-3" />
                                                <span>1 a 3 horas</span>
                                            </label>
                                        </li>
                                        <li class="checkbox-item">
                                            <label class="checkbox-label">
                                                <input type="checkbox" checked class="duration-filter" value="3-6" />
                                                <span>3 a 6 horas</span>
                                            </label>
                                        </li>
                                        <li class="checkbox-item">
                                            <label class="checkbox-label">
                                                <input type="checkbox" checked class="duration-filter" value="6+" />
                                                <span>6+ horas</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <span class="cross"><i class="fa-regular fa-chevron-up"></i></span>
                                </div>
                                <div class="trip-type side-box">
                                    <h6>Tipo de Tour</h6>
                                    <ul class="checkbox-list">
                                        <li class="checkbox-item">
                                            <label class="checkbox-label">
                                                <input type="checkbox" checked class="type-filter" value="globo" />
                                                <span>En Globo</span>
                                            </label>
                                            <span>5</span>
                                        </li>
                                        <li class="checkbox-item">
                                            <label class="checkbox-label">
                                                <input type="checkbox" checked class="type-filter" value="cultural" />
                                                <span>Cultural</span>
                                            </label>
                                            <span>3</span>
                                        </li>
                                        <li class="checkbox-item">
                                            <label class="checkbox-label">
                                                <input type="checkbox" checked class="type-filter" value="aventura" />
                                                <span>Aventura</span>
                                            </label>
                                            <span>1</span>
                                        </li>
                                    </ul>
                                    <span class="cross"><i class="fa-regular fa-chevron-up"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <!-- filter top-area  -->
                        <div class="filter-small-top-full mb--30">
                            <div class="left-filter">
                                <span id="tour-count">8 tours encontrados</span>
                            </div>
                            <div class="right-filter">
                                <button class="rts-btn btn-primary" onclick="clearFilters()" style="padding: 8px 20px; font-size: 14px;">Limpiar Filtros</button>
                                <div class="form-area">
                                    <div class="custom-select">
                                        <span class="dropdown-icon">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </span>
                                        <div class="custom-select-trigger">Ordenar Por</div>
                                        <ul class="custom-options" style="height: 0px;">
                                            <li class="option selected" data-value="1">Precio Ascendente</li>
                                            <li class="option" data-value="2">Precio Descendente</li>
                                            <li class="option" data-value="3">Duración</li>
                                        </ul>
                                        <input type="hidden" name="sort" value="1">
                                    </div>
                                </div>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                            <i class="fa-light fa-grid-2"></i>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                            <i class="fa-light fa-list"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- filter top-area end -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row g-5" id="tours-container">
                                    <!-- Tours will be populated here -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- List view if needed -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
const tours = [
    {
        id: 1,
        title: "Globo + Desayuno + Pirámides",
        price: 3799,
        duration: "7-8 horas",
        durationFilter: "6+",
        type: "globo",
        image: "assets/images/package/tourGlobo.jpg",
        location: "Teotihuacan",
        rating: 5,
        reviews: 10
    },
    {
        id: 2,
        title: "Cuevas + Pirámides con Transporte",
        price: 2200,
        duration: "6 horas",
        durationFilter: "6+",
        type: "cultural",
        image: "assets/images/package/tourCueva.jpg",
        location: "Teotihuacan",
        rating: 5,
        reviews: 8
    },
    {
        id: 3,
        title: "Pirámides + Transporte",
        price: 1950,
        duration: "5 horas",
        durationFilter: "3-6",
        type: "cultural",
        image: "assets/images/package/piramyds.jpg",
        location: "Teotihuacan",
        rating: 4.8,
        reviews: 12
    },
    {
        id: 4,
        title: "Globo + Desayuno Buffet",
        price: 3500,
        duration: "4 horas",
        durationFilter: "3-6",
        type: "globo",
        image: "assets/images/package/tourglobos.jpg",
        location: "Teotihuacan",
        rating: 5,
        reviews: 15
    },
    {
        id: 5,
        title: "Pirámides Exprés",
        price: 700,
        duration: "3 horas",
        durationFilter: "1-3",
        type: "cultural",
        image: "assets/images/package/tour4.jpg",
        location: "Teotihuacan",
        rating: 4.5,
        reviews: 20
    },
    {
        id: 6,
        title: "Globo sin Transporte",
        price: 2500,
        duration: "3-4 horas",
        durationFilter: "3-6",
        type: "globo",
        image: "assets/images/package/tour02globo.jpg",
        location: "Teotihuacan",
        rating: 4.9,
        reviews: 18
    },
    {
        id: 7,
        title: "Cuatrimoto (2 personas)",
        price: 1600,
        duration: "2.5-3 horas",
        durationFilter: "1-3",
        type: "aventura",
        image: "assets/images/package/tourCuatrimotos.jpg",
        location: "Teotihuacan",
        rating: 4.7,
        reviews: 6
    },
    {
        id: 8,
        title: "Pirámides + Desayuno Buffet + Transporte",
        price: 2799,
        duration: "6 horas",
        durationFilter: "6+",
        type: "cultural",
        image: "assets/images/package/piramyds.jpg",
        location: "Teotihuacan",
        rating: 5,
        reviews: 14
    }
];

function renderTours(filteredTours) {
    const container = document.getElementById('tours-container');
    container.innerHTML = '';
    filteredTours.forEach(tour => {
        const tourHTML = `
            <div class="col-xl-4 col-lg-6 col-md-6 col-12 tour-item" data-price="${tour.price}" data-duration="${tour.durationFilter}" data-type="${tour.type}">
                <div class="tour-wrapper radius-10 image-transform border">
                    <div class="image-area radius-6">
                        <a href="tour-details/${tour.id}">
                            <img class="hover-image" src="${tour.image}" alt="" style="width: 100%; height: 250px; object-fit: cover;">
                            <span class="tag">$${tour.price}/persona</span>
                        </a>
                    </div>
                    <div class="content">
                        <h6 class="title"><a href="tour-details/${tour.id}">${tour.title}</a></h6>
                        <ul class="meta-content">
                            <li><i class="fa-light fa-location-dot"></i> ${tour.location}</li>
                            <li><i class="fa-light fa-clock"></i> ${tour.duration}</li>
                        </ul>
                        <div class="button-area">
                            <a href="tour-details/${tour.id}" class="rts-btn btn-primary border">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        `;
        container.innerHTML += tourHTML;
    });
    updateTourCount(filteredTours.length);
}

function updateTourCount(count) {
    document.getElementById('tour-count').textContent = `${count} tours encontrados`;
}

function filterTours() {
    const minPrice = parseInt(document.getElementById('minRange').value);
    const maxPrice = parseInt(document.getElementById('maxRange').value);
    const selectedDurations = Array.from(document.querySelectorAll('.duration-filter:checked')).map(cb => cb.value);
    const selectedTypes = Array.from(document.querySelectorAll('.type-filter:checked')).map(cb => cb.value);

    const filtered = tours.filter(tour => {
        const priceMatch = tour.price >= minPrice && tour.price <= maxPrice;
        const durationMatch = selectedDurations.length === 0 || selectedDurations.includes(tour.durationFilter);
        const typeMatch = selectedTypes.length === 0 || selectedTypes.includes(tour.type);
        return priceMatch && durationMatch && typeMatch;
    });

    renderTours(filtered);
}

function clearFilters() {
    document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = true);
    document.getElementById('minRange').value = 700;
    document.getElementById('maxRange').value = 3799;
    document.getElementById('minPrice').textContent = '$700';
    document.getElementById('maxPrice').textContent = '$3799';
    renderTours(tours);
}

document.addEventListener('DOMContentLoaded', () => {
    renderTours(tours);

    // Price range
    const minRange = document.getElementById('minRange');
    const maxRange = document.getElementById('maxRange');
    const minPrice = document.getElementById('minPrice');
    const maxPrice = document.getElementById('maxPrice');

    function updatePrices() {
        minPrice.textContent = '$' + minRange.value;
        maxPrice.textContent = '$' + maxRange.value;
        filterTours();
    }

    minRange.addEventListener('input', updatePrices);
    maxRange.addEventListener('input', updatePrices);

    // Filters
    document.querySelectorAll('.duration-filter, .type-filter').forEach(cb => {
        cb.addEventListener('change', filterTours);
    });
});
</script>

<style>
.tour-item { display: block; }
</style>

<?php include __DIR__ . '/footer.php'; ?>