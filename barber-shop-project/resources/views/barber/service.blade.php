<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Lista de Preços'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
</head>


<body class="text-center barbershop-bg">
    @include('inc.nav')
    <section class="container">
        <div style="margin-left: auto; margin-right: auto; margin-top: 10%">
            <h5 class="mb-5 fst-italic">Lista de Serviços e Preços</h5>
            <div class="row clearfix card-body">
                @foreach ($services as $service)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm hover-effect card-hover">
                            <div class="card-body">
                                <h5 class="card-title">{{ $service->service }}</h5>
                                <p class="card-text">Preço: R$ {{ number_format($service->price, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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
