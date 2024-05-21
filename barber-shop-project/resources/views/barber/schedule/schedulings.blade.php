<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Agendamentos'])
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/list/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/list/main.min.js"></script>

</head>

<body class="barbershop-bg">
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
                    <a class="text-decoration-none small profile-link mr-link" href="/schedule/new">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i> Alterar
                    </a>
                </div>
            </h5>
        </div>

        <div class="container text-center">
            <h6>Datas Sugeridas</h6>
        </div>

        <div class="container">
            <div id="calendar"></div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            if (!calendarEl) {
                console.error('Element with id "calendar" not found.');
                return;
            }

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['list'],
                initialView: 'listWeek',
                events: function(info, successCallback, failureCallback) {
                    var start = info.startStr;
                    var profId = {{ $prof->id }};
                    console.log('Profissional ID:', profId);
                    if (!start || !profId) {
                        console.error('Start or profId is missing.');
                        return;
                    }
                    $.ajax({
                        url: '/events/weekly/' + start + '/' + profId,
                        success: successCallback,
                        error: failureCallback
                    });
                },
                eventTimeFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short'
                },
                headerToolbar: false
            });

            calendar.render();
        });
    </script>
</body>

</html>
