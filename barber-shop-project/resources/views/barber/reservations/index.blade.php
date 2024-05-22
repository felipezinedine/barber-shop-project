<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Minhas Reservas'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
</head>

<body>
    @include('barber.schedule.inc.nav')

    <section class="container">
        @if (count($schedullings) >= 1)
        <div class="mb-5">
            <div class="row clearfix card-body">
                @foreach ($schedullings as $schedule)
                <div class="col-md-12">
                    <div class="col-md-12 card shadow-sm hover-effect card-hover mt-5">
                        <div class="card-header">
                            <div class="col-md-12">
                                <h6 style="margin-left: 8px" class="card-title mt-2">
                                    Horário marcado para o dia: <strong>{{ \App\Models\Help::dateBr($schedule->date) }}</strong> ás
                                    <strong>{{ \Carbon\Carbon::create($schedule->time)->format('H:i') }} </strong>
                                </h6>
                                <h6 style="margin-left: 8px">
                                    @if ($schedule->services->service == 'Corte')
                                        #{{ $schedule->services->service }}
                                    @elseif (
                                        $schedule->services->service == 'Barba' ||
                                            $schedule->services->service == 'Corte e Barba' ||
                                            $schedule->services->service == 'Corte e Selagem' ||
                                            $schedule->services->service == 'Sobrancelha' ||
                                            $schedule->services->service == 'Selagem')
                                        *{{ $schedule->services->service }}
                                    @else
                                        {{ $schedule->services->service }}
                                    @endif
                                </h6>
                                <h6 style="margin-left: 8px"><strong>Profissional: </strong>{{ $schedule->user->name }}</h6>
                                <p style="margin-left: 8px" class="card-text"> R$
                                    {{ number_format($schedule->services->price, 2, ',', '.') }}
                                </p>
                            </div>
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <a href="/reservations/cancel/{{$schedule->id}}" class="btn text-danger" type="submit"> <i class="fa-solid fa-trash"></i> Apagar / Cancelar Agendamento</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
            <div class="mb-5" style="margin-top: 20%">
                <div class="row clearfix text-center">
                    <div class="col-md-12">
                        <div class="col-md-12 mt-5">
                            <div class="col-md-12">
                                <h6>Você ainda não agendou nenhum horário</h6>
                                <a href="/schedule/new" class="text-decoration-none">AGENDAR NOVO HORÁRIO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </section>
</body>

</html>
