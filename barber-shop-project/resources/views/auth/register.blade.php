<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Registrar-se'])

</head>

<body class="barbershop-bg">
    @include('barber.schedule.inc.nav')
    <section class="container">
        <main class="form-signin w-100 m-auto mt-5">
            <form action="/register" method="POST" class="container" style="width: 40%">
                @csrf
                <h6 class="h6 mb-3 fw-normal text-center">Informe os dados abaixo</h6>

                <div class="row clearfix">
                    <div class="form-group col-lg-12 col-md-12 ">
                        <label for="" class="fw-light">Nome</label>
                        <input type="text" name="name" class="form-control custom-input mb-3"
                            placeholder="Digite seu nome completo"
                            required style="white-space: nowrap;">
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="form-group col-lg-12 col-md-12 ">
                        <label for="" class="fw-light">Email</label>
                        <input type="email" name="email" class="form-control custom-input mb-3"
                            placeholder="Digite seu email"
                            required style="white-space: nowrap;">
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="form-group col-lg-12 col-md-12 ">
                        <label for="" class="fw-light">Telefone</label>
                        <input type="tel" name="phone" class="form-control custom-input mb-3"
                            placeholder="(00) 0 0000-0000" data-mask="(00) 0 0000-0000" id="phone-number"
                            required style="white-space: nowrap;">
                    </div>
                </div>

                <div class="form-check text-start my-2">
                    <a class="text-primary text-decoration-none ms-0" href="/auth">Já tenho cadastro</a>
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
