<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Inicio'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body class="text-center barbershop-bg">
    @include('inc.nav')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8">
                <main class="text-center">
                    <h1 class="fst-italic">Bem-vindo à nossa barbearia</h1>
                    <p class="lead fst-italic">"Os melhores profissionais, ambiente aconchegante, amplo estacionamento.
                        Cuidamos de você, da sua família e seus veículos"
                    </p>
                    <h6 class="fst-italic">
                        Utilize o botão abaixo e faça seu agendamento online
                    </h6>
                    <p class="lead">
                        <a href="/schedule/" target="_blank" class="btn btn-lg military-green fw-bold mt-3">Agenda Online</a>
                    </p>
                </main>

                <hr>

                <h5 class="fst-italic text-center mb-4">
                    Nossa Localidade
                </h5>

                <div id="map" style="height: 400px;"></div>
            </div>
        </div>
    </div>







    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script>
        var map = L.map('map').setView([-16.720962, -49.287052], 17); // Define as coordenadas da localização e o nível de zoom
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map); // Adiciona um layer do OpenStreetMap

        L.marker([-16.720962, -49.287052]).addTo(map) // Substitua as coordenadas pelas obtidas da geocodificação
        .bindPopup("<b>Av. C-104, Qd 396 - Lt 14/15</b><br>Jardim América, Goiânia - GO<br>74250-030, Brasil").openPopup();
    </script>
</body>

</html>
