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
        <div class="mb-5">
            <div class="row clearfix card-body">
                <div class="col-md-12">
                    <div class="col-md-12 card shadow-sm hover-effect card-hover mt-5">
                        <div class="card-header">
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
                            <h6 style="margin-left: 8px"><strong>Profissional: </strong>{{ $prof->name }}</h6>
                            <p style="margin-left: 8px" class="card-text"> R$
                                {{ number_format($cut->price, 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix mt-5">
            <div class="col-md-12">
                <div class="col-md-12 card shadow-sm hover-effect card-hover mt-5">
                    <div class="card-header">
                        <h6>Formas de Pagamento</h6>
                        <hr>
                        <p><i class="fa-solid fa-check-double"></i> <i class="fa-solid fa-handshake"></i> Pagar no dia /
                            Presencial</p>
                        <hr>
                        <div>
                            <p>
                            <h6>Total: R$ {{ number_format($cut->price, 2, ',', '.') }}</h6>
                            </p>
                        </div>
                        <form action="/schedule/completed" method="POST">
                            @csrf
                            <input type="hidden" name="professional_id" value="{{ $prof->id }}">
                            <input type="hidden" name="service_id" value="{{ $cut->id }}">
                            <input type="hidden" name="client_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="date"
                                value="{{ \Carbon\Carbon::parse(Session::get('date'))->format('Y-m-d') }}">
                            <input type="hidden" name="hours"
                                value="{{ \Carbon\Carbon::parse(Session::get('date'))->addHours(-3)->format('H:i:s') }}">
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button class="btn btn-dark" type="submit">Concluir Agendamento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
