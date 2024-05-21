<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.head', ['title' => 'Verificação'])

</head>

<body class="barbershop-bg">
    @include('barber.schedule.inc.nav')
    <section class="container">
        @if (Session::has('verification_code'))
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Código de Verificação Enviado</h5>
                            <p class="card-text">Um código de verificação foi enviado para o número
                                {{ Session::get('phone_number') }}.</p>
                            <p class="card-text">Por favor, insira o código abaixo:</p>
                            <h5 class="card-text">Código de Verificação: {{ Session::get('verification_code') }}</h5>
                    </div>
                </div>
            </div>
        @endif

        <div class="container mt-5">
            <h4>Verificação de Código por SMS</h4>
            <form id="smsVerificationForm" method="POST" action="/verify-account">
                @csrf
                <div class="form-group col-md-4">
                    <label for="verificationCode"><h6>Código de Verificação:</h6></label>
                    <input type="text" class="form-control mb-3 mt-2" id="verificationCode" name="code" placeholder="Digite o código de verificação" required>
                    <div class="invalid-feedback">Por favor, insira o código de verificação.</div>
                </div>
                <button type="submit" class="btn btn-primary" id="submitButton" disabled>Verificar</button>
                <p id="verificationResult" class="mt-3"></p>
            </form>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const verificationCodeInput = document.getElementById('verificationCode');
            const submitButton = document.getElementById('submitButton');
            const sessionVerificationCode = "{{ Session::get('verification_code') }}";

            verificationCodeInput.addEventListener('keyup', function() {
                if (verificationCodeInput.value.trim() === sessionVerificationCode.trim()) {
                    submitButton.disabled = false;
                } else {
                    submitButton.disabled = true;
                }
            });
        });
    </script>
</body>

</html>
