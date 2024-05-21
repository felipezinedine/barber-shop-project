<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Agendamentos | Reservas'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
</head>


<body class="d-flex h-100 text-center barbershop-bg">
    <section class="container d-flex align-items-center justify-content-center">
        <div class="container">
            <h1 class="text-center fst-italic mb-5">Barbearia</h1>
            <div class="row">
                <div class="col-md-6 mt-5">
                    <a href="/schedule/new" class="text-center text-decoration-none">
                        <div class="card text-center custom-bg-dark text-white card-hover">
                            <div class="card-body">
                                <h3><i class="fa-regular fa-clock"></i></h3>
                                <h5 class="card-title">NOVO</h5>
                                <h6 class="card-text">AGENDAMENTO</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mt-5">
                    <a href="" class="text-center text-decoration-none">
                        <div class="card text-center custom-bg-blue text-white card-hover">
                            <div class="card-body">
                                <h3><i class="fa-solid fa-clipboard-list"></i></h3>
                                <h5 class="card-title">MINHAS</h5>
                                <h6 class="card-text">RESERVAS</h6>
                            </div>
                        </div>
                    </a>
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
