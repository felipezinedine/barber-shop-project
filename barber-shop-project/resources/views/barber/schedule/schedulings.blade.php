<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Agendamentos'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
</head>

<body>
    @include('barber.schedule.inc.nav')
    <section class="d-flex flex-column align-items-center justify-content-center">
        <div class="mt-4 mr-auto container">
            <h5 class="font-weight-bold">
                @if ($cut->service == 'Corte')
                    <div class="d-inline-flex align-items-center">
                        <h6 class="card-title text-center ms-1 small">#{{ $cut->service }}</h6>
                    </div>
                @elseif (
                    $cut->service == 'Barba' ||
                        $cut->service == 'Corte e Barba' ||
                        $cut->service == 'Corte e Selagem' ||
                        $cut->service == 'Sobrancelha' ||
                        $cut->service == 'Selagem')
                    <div class="d-inline-flex align-items-center">
                        <h6 class="card-title text-center ms-1 small">*{{ $cut->service }}</h6>
                    </div>
                @else
                    <div class="d-inline-flex align-items-center">
                        <h6 class="card-title text-center ms-1 small">{{ $cut->service }}</h6>
                    </div>
                @endif
            </h5>
        </div>
        <div class="container mr-auto mt-3">
            <h5 class="font-weight-bold">
                <div class="d-inline-flex align-items-center profile-header">
                    <div class="profile-info d-inline-flex align-items-center">
                        <img width="12%"
                            src="./../../../../img/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-free-vector.jpg"
                            class="rounded-circle" alt="...">
                        <h6 class="card-title profile-name ml-2">{{ $prof->name }}</h6>
                    </div>
                    <a class="text-decoration-none small profile-link mr-link" href="/schedule/{{$cut->id}}/professional/choice/">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i> Alterar
                    </a>
                </div>
            </h5>
        </div>

        <div class="container text-center">
            <h6>Datas Sugeridas</h6>
        </div>

        <div class="mb-5" id="calendar"></div>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarId = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarId, {
                locale: 'pt-br',
                timeZone: 'local',
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'today'
                },
                buttonText: {
                    today: 'Hoje',
                    month: 'Mês',
                    week: 'Semana',
                    day: 'Dia',
                    list: 'Lista'
                },
                events: '/schedule/events/weekly/{{ $prof->id }}',
                validRange: {
                    start: '2024-01-01',
                    end: '2030-12-31'
                },
                eventTimeFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short'
                },
                hiddenDays: [0],
                slotMinTime: '08:00:00',
                slotMaxTime: '20:30:00',
                selectable: true,
                select: function(info) {
                    var now = new Date();
                    var selectedDateTime = new Date(info.start);
                    if (selectedDateTime < now || (selectedDateTime.getDate() === now.getDate() &&
                            selectedDateTime.getHours() < now.getHours())) {
                        alert('Você não pode adicionar eventos em datas ou horas passadas.');
                        calendar.unselect();
                        return;
                    }

                    userId = {{ auth()->user()->id }}
                    profId = {{ $prof->id }}
                    var eventData = {
                        title: 'HORÁRIO MARCADO',
                        start: selectedDateTime.toISOString(),
                        userId: userId,
                        profId: profId
                    };

                    window.location.href = '/schedule/add/events?start=' + encodeURIComponent(
                            selectedDateTime.toISOString()) + '&userId=' + userId + '&profId=' +
                        {{ $prof->id }} + '&cutId=' + {{ $cut->id }};

                    calendar.unselect();
                }
            });
            calendar.render();
        });
    </script>
</body>

</html>
