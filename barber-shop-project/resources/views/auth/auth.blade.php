<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Autenticação'])

</head>

<body class="barbershop-bg">
    @include('barber.schedule.inc.nav')
    <section class="container">
        <main class="form-signin w-100 m-auto mt-5">
            <form action="/auth" method="POST" class="container" style="width: 40%">
                @csrf
                <h6 class="h6 mb-3 fw-normal text-center">Informe o número do seu celular</h6>

                <div class="row clearfix">
                    <div class="form-group col-lg-12 col-md-12 ">
                        <label for="Telefone" class="fw-light">Telefone</label>
                        <input type="tel" name="cellphone" class="form-control custom-input mb-3"
                            placeholder="(00) 0 0000-0000" data-mask="(00) 0 0000-0000" id="phone-number" name="phone"
                            required style="white-space: nowrap;">
                    </div>
                </div>

                <div class="form-check text-start my-2">
                    <a class="text-danger text-decoration-none ms-0" href="/register">Não tenho cadastro</a>
                </div>
                <button class="btn btn-light w-100 py-2" id="submitBtn" disabled type="submit">Verificar Celular</button>
            </form>
        </main>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const phoneNumberInput = document.getElementById('phone-number');
            const submitButton = document.getElementById('submitBtn');

            phoneNumberInput.addEventListener('input', function() {
                if (phoneNumberInput.value.length === 16) {
                    submitButton.disabled = false;
                } else {
                    submitButton.disabled = true;
                }
            });
        });

        $(document).ready(function() {
            $('#phone-number').mask('(00) 0 0000-0000')
        });
    </script>
</body>

</html>
