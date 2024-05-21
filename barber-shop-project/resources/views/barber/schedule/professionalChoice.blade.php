<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Agendamentos'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
</head>


<body class="barbershop-bg">
    @include('barber.schedule.inc.nav')
    <section class="d-flex flex-column align-items-center justify-content-center">
        <div class="mb-5 mt-4">
            <h5 class="text-center font-weight-bold">
                @if ($service->service == 'Corte')
                <div class="d-inline-flex align-items-center">
                    <h6 class="card-title text-center ms-1 small">#{{ $service->service }}</h6>
                    <a class="text-decoration-none text-center ms-5 small" href="/schedule/new"><i class="fa-solid fa-arrow-right-arrow-left"></i>Alterar</a>
                </div>
                @elseif (
                    $service->service == 'Barba' ||
                        $service->service == 'Corte e Barba' ||
                        $service->service == 'Corte e Selagem' ||
                        $service->service == 'Sobrancelha' ||
                        $service->service == 'Selagem')
                    <div class="d-inline-flex align-items-center">
                        <h6 class="card-title text-center ms-1 small">*{{ $service->service }}</h6>
                        <a class="text-decoration-none text-center ms-5 small" href="/schedule/new"><i class="fa-solid fa-arrow-right-arrow-left"></i>Alterar</a>
                    </div>
                @else
                <div class="d-inline-flex align-items-center">
                    <h6 class="card-title text-center ms-1 small">{{ $service->service }}</h6>
                    <a class="text-decoration-none text-center ms-5 small" href="/schedule/new"><i class="fa-solid fa-arrow-right-arrow-left"></i>Alterar</a>
                </div>
                @endif
            </h5>
        </div>
        <div class="container mb-5">
            <h5 class="text-center font-weight-bold">Escolha o Profissional</h5>
        </div>

        <div class="mt-5">
            <div class="row clearfix card-body">
                @foreach ($professionals as $prof)
                    <div class="col-md-3">
                        <div class="card mb-3 shadow-sm hover-effect card-hover">
                            <div class="card-body">

                                <p class="card-title text-center">
                                    <img width="30%" src="./../../../../img/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-free-vector.jpg" class="rounded-circle" alt="...">
                                </p>
                                <h6 class="card-text text-center">{{ $prof->name }}</h6>
                                <hr>
                                <div class="text-center">
                                    <a href="/schedule/{{ $service->id }}/professional/choice/{{$prof->id}}"
                                        class="btn text-decoration-none"> SELECIONAR
                                    </a>
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
        $('.dropdown-toggle').dropdown()
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
