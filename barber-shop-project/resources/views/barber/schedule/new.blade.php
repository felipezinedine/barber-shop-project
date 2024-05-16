<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Agendamentos'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
</head>


<body class="barbershop-bg">
    @include('barber.schedule.inc.nav')
    <section class="container d-flex flex-column align-items-center justify-content-center">
        <div class="container mb-5 mt-4">
            <h5 class="text-center font-weight-bold">Escolha uma opção</h5>
        </div>
        <div class="container text-center col-md-12 mb-3">
            <form data-url="/schedule/new/search" method="GET">
                <div class="col-md-8 mx-auto">
                    <div class="input-group flex-nowrap">
                        <input type="text" class="form-control" id="search" name="search"
                            placeholder="Procurar..." aria-label="Procurar..." aria-describedby="addon-wrapping">
                        <button type="submit" class="input-group-text" id="addon-wrapping"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-5">
            <div class="row clearfix card-body">
                @foreach ($services as $service)
                    <div class="col-md-3">
                        <div class="card mb-3 shadow-sm hover-effect card-hover">
                            <div class="card-body">
                                @if ($service->service == 'Corte')
                                    <h5 class="card-title text-center">#{{ $service->service }}</h5>
                                @elseif (
                                    $service->service == 'Barba' ||
                                        $service->service == 'Corte e Barba' ||
                                        $service->service == 'Corte e Selagem' ||
                                        $service->service == 'Sobrancelha' ||
                                        $service->service == 'Selagem')
                                    <h5 class="card-title text-center">*{{ $service->service }}</h5>
                                @else
                                    <h5 class="card-title text-center">{{ $service->service }}</h5>
                                @endif
                                <span class="card-text">Duração: {{ $service->time }} min</span>
                                <p class="card-text">Preço: R$ {{ number_format($service->price, 2, ',', '.') }}</p>
                                <hr>
                                <div class="text-center">
                                    <a href="/schedule/{{$service->id}}/professional/choice" class="btn text-decoration-none"><i
                                            class="fa-solid fa-calendar-day"></i> RESERVAR</a>
                                </div>
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

    <script>
        $(function() {
            $('#search').keyup(function() {
                var search = $('#search').val();
                if (search.length > 0) {
                    $.ajax({
                        url: $('form').attr('data-url'),
                        method: 'GET',
                        data: {
                            search: search
                        }
                    });
                }
            })
        })
    </script>
</body>

</html>
