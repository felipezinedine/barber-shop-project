<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Agendamentos'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
</head>

<body>
    @include('barber.schedule.inc.nav')

    <section class="container">
        <div>
            <div class="row clearfix card-body">
                <div class="col-md-12">
                    <div class="col-md-12 card shadow-sm hover-effect card-hover mt-5">
                        <h6 style="margin-left: 8px" class="card-title mt-2">
                            Horário marcado para o dia: <strong>{{ $data }}</strong> ás
                            <strong>{{ $hours }}</strong>
                        </h6>
                        <h6 style="margin-left: 8px">
                            @if ($cut->service == 'Corte')
                                #{{ $cut->service }}
                            @elseif (
                                $cut->service == 'Barba' ||
                                    $cut->service == 'Corte e Barba' ||
                                    $cut->service == 'Corte e Selagem' ||
                                    $cut->service == 'Sobrancelha' ||
                                    $cut->service == 'Selagem')
                                *{{ $cut->service }}
                            @else
                                {{ $cut->service }}
                            @endif
                        </h6>
                        <h6 style="margin-left: 8px">{{ $prof->name }}</h6>
                        <p style="margin-left: 8px" class="card-text"> R$ {{ number_format($cut->price, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>
