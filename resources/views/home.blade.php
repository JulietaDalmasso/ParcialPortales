<x-layouts.main>
    <x-slot:title>Inicio</x-slot:title>
    <section class="hero">
        <h1 class="hero-title">creative</h1>
        <p class="hero-subtitle">Somos una agencia<br>digital creativa.</p>
    </section>
    <section class="servicios-home">
        <h2>Contamos con servicios de</h2>
    
        <div class="servicios-home-grid">
            <div class="servicio-home-item">
                <img src="{{ asset('images/diseno.png') }}" alt="Diseño Gráfico">
                <h3>Diseño Gráfico</h3>
            </div>
    
            <div class="servicio-home-item">
                <img src="{{ asset('images/fotografia.png') }}" alt="Fotografía Profesional">
                <h3>Fotografía</h3>
            </div>
    
            <div class="servicio-home-item">
                <img src="{{ asset('images/web.png') }}" alt="Desarrollo Web">
                <h3>Desarrollo Web</h3>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="about-content">
            <h2 class="about-title">Somos Maju</h2>
            <p class="about-subtitle">creamos y diseñamos.</p>

                <div class="about-photo">
                    <img src="{{ asset('images/nosotras.jpeg') }}" alt="Julieta y Malena" class="about-img">
                </div>

            <p class="about-description">
                Fundada en 2025, <strong>Maju</strong> es una agencia digital creada por 
                <span class="highlight">Malena y Julieta.</span>
                <br><br>
                Nos encanta construir marcas, experiencias y sitios web que inspiren.  
                Cada proyecto es una oportunidad para aprender, crear y disfrutar lo que hacemos.
            </p>
        </div>
</x-layouts.main>



