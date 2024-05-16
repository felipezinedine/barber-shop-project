<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Horário de Funcionamento'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
</head>


<body class="d-flex h-100 text-center barbershop-bg">
    @include('inc.sidebar')
    <section class="container">
        <div class="row mt-5">
            <div class="d-inline-block">
                <i class="fa-regular fa-clock"></i>
            </div>

            <h4 class="mt-3 fst-italic">Horário de Funcionamento</h4>
            <div class="col mt-4">
                <div>Segunda - Sábado</div>
                <div class="mb-4">08:00am – 08:30pm</div>
                <hr>
                <div>Domingo</div>
                <div>Fechado</div>
            </div>
        </div>

        <div class="mt-5 footer">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5">
                <div class="col mb-3">
                    <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                        <svg class="bi me-2" width="40" height="32">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>
                    <p class="text-body-secondary">&copy; 2024</p>
                </div>

                <div class="col mb-4">
                    <p class="fst-italic">Barbearia</p>
                </div>

                <div class="col mb-4">
                    <h5>Páginas</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/"
                                class="nav-link p-0 text-body-secondary">Barbearia</a></li>
                        <li class="nav-item mb-2"><a href="/barber/price/list"
                                class="nav-link p-0 text-body-secondary">Lista de Preços</a></li>
                        <li class="nav-item mb-2"><a href="/barber/opening/hours"
                                class="nav-link p-0 text-body-secondary">Horário de Funcionamento</a></li>
                    </ul>
                </div>

                <div class="col mb-4">
                    <h5>Siga-nos</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a target="_blank" href="https://www.instagram.com/felipe.z05/"
                                class="nav-link p-0 text-body-secondary"> <i class="fa-brands fa-instagram"></i>
                                Instagram</a></li>
                    </ul>
                </div>
            </footer>
            <hr style="margin-top: -8%">
            <div class="row clearfix">
                <div class="col-md-4 mb-5">
                    <p>
                        Av. C-104 Q.396 L.14 Jardim America
                    </p>
                    <p>
                        Goiânia, 74250030, BR
                    </p>
                </div>
                <div class="col-md-8 mb-5">
                    <a target="_blank" class="nav-link p-0 text-primary"
                        href="https://www.google.com.br/maps/place/Bartholomeu+Barbearia+e+Lava+R%C3%A1pido/@-16.7208681,-49.2896884,17z/data=!3m1!4b1!4m6!3m5!1s0x935ef72a6744c067:0x84fa95e875427972!8m2!3d-16.7208733!4d-49.2871135!16s%2Fg%2F11h08h3tf?entry=ttu">Mapa</a>
                </div>
            </div>
        </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
