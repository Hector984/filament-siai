<!DOCTYPE html>
<html lang="es">

<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
</head>

<style>
    .fi-icon-btn {
        padding-top: 9px;
    }

    .items-center {
        align-items: unset;
    }

    .margin-logo-institucional {
        margin-bottom: 40px;
        width: 250px;
        height: 50px;
    }

    .img-login-2 {
        height: 100%;
        width: 45rem;
    }

    .main-login {
        display: flex;

    }

    hr.red {
        margin: 0;
    }

    @media (min-width: 640px) {
        .sm\:max-w-lg {
            max-width: 72rem;
        }
    }
</style>

<body>
    <div>
        <div class="main-login">

            <div>
                <td class="p-0 td-login img-login">
                    <img src="{{ asset('images/login_3.jpg') }}" alt="" class="img-fluid p-0 img-login img-login-2">
                </td>
            </div>

            <div>
                <td class="td-login img-login">
                    <img src="{{ asset('images/logoagricultura.png') }}" alt="" class="img-fluid p-0 img-login margin-logo-institucional">
                </td>

                <x-filament-panels::form wire:submit="authenticate">
                    {{ $this->form }}

                    <button type="submit" class="float-right btn btn-primary btn-sm btn-red-config text-size-14">
                        Iniciar sesión
                    </button>
                </x-filament-panels::form>
            </div>
        </div>
    </div>

</body>

</html>