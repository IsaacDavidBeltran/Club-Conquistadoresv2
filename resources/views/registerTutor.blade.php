<!-- resources/views/register.blade.php -->
<!DOCTYPE html>

<head>
    <title>@lang('app.registration')</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ asset('/css/register.css') }}" rel="stylesheet">

</head>

<form class="FormLayout" method="POST" action="{{ route('register') }}" id="registro">
    @csrf


    <h1>@lang('app.Register')@lang('app.registration')</h1>

    <h2>@lang('app.tutors_personal_details')</h2>
    <div class='RegistroDiv'>
        <div class='SeccionDiv1'>
            <div class='SubSeccionDiv'>
                <div>
                    <label for="name">@lang('app.Name')</label>
                    <input id="name" type="text" name="name" required autofocus><br>
                </div>

                <div>

                    <label for="apellido">@lang('app.lastname')</label>
                    <input id="apellido" type="text" name="apellido" class="Input" required><br>
                </div>
            </div>

            <div class='EmailDiv'>
                <label for="email">@lang('app.email')</label>
                <input id="email" type="email" name="email" required><br>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="password">@lang('app.Password')</label>
                    <input id="password" type="password" name="password" required><br>
                </div>

                <div>
                    <label for="telefono">@lang('app.Phone')</label>
                    <input id="telefono" type="text" name="telefono"><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="fecha_nacimiento">@lang('app.Birthdate')</label>
                    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" required><br>
                </div>

                <div>
                    <label for="sexo">@lang('app.Sex')</label>
                    <select id="sexo" name="sexo" required><br>
                        <option value="">@lang('app.Select_a_gender')</option>
                        <option value="Hombre">@lang('app.man')</option>
                        <option value="Mujer">@lang('app.woman')</option>
                        <option value="Otro">@lang('app.Other')</option>
                    </select>
                </div>
            </div>
        </div>
        <h2 class='DatosH2'>@lang('app.tutors_residence_information')</h2>
        <div class='SeccionDiv2'>
            <div class='SubSeccionDiv'>
                <div>
                    <label for="calle">@lang('app.street')</label>
                    <input id="calle" type="text" name="calle" required><br>
                </div>

                <div>
                    <label for="numero_exterior">@lang('app.street_number') </label>
                    <input id="numero_exterior" type="text" name="numero_exterior" required><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="numero_interior">@lang('app.suite_number')</label>
                    <input id="numero_interior" type="text" name="numero_interior"><br>
                </div>

                <div>
                    <label for="colonia">@lang('app.neighborhood')</label>
                    <input id="colonia" type="text" name="colonia" required><br>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="PaisDiv">
                    <label for="pais">@lang('app.Country')</label>
                    <select id="pais">
                        <option value="">@lang('app.Select a country')</option>
                    </select>
                </div>

                <div>
                    <label for="estado">@lang('app.State')</label>
                    <select id="estado"></select>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div class="MunicipioDiv">
                    <label for="municipio">@lang('app.Municipality')</label>
                    <select id="municipio"></select>
                </div>

                <div>
                    <label for="ciudad_id">@lang('app.city')</label>
                    <select id="ciudad_id" name="ciudad_id"></select>
                </div>
            </div>

            <div class='SubSeccionDiv'>
                <div>
                    <label for="codigo_postal">@lang('app.Postal code')</label>
                    <input id="codigo_postal" type="text" name="codigo_postal" required><br>
                </div>
            </div>
        </div>

        <div class="ButtonsDiv">

            <div>
                <a class="HomeBtn" id="home-button" onclick="window.location.href = '/';">
                    @lang('app.Back')
                </a>
            </div>

            <div>
                <button class="RegisterBtn" type="submit" id="submit-button" disabled>
                    @lang('app.sign_in')
                </button>
            </div>
        </div>
    </div>

</form>

@if ($errors->any())
    <script>
        let errorsExist = true;
        let title_error = "{{ __('app.error_title') }}";
        let error = "{{ __('app.error_message') }}";
        let button = "{{ __('app.accept_error') }}";
        let errorList =
            '@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach';

        if (errorsExist) {
            Swal.fire({
                icon: 'error',
                title: title_error,
                text: error,
                confirmButtonText: button,
                footer: '<ul>' + errorList + '</ul>'
            });
        }
    </script>
@endif

<script type="text/javascript">
    $(document).ready(function() {
        console.log("Hola");
        $.ajax({
            url: "{{ url('api/get-pais-list') }}",
            type: "GET",
            success: function(res) {
                if (res) {
                    $('#pais').empty();
                    $('#pais').append('<option>{{__("app.select")}}</option>');
                    $.each(res, function(key, value) {
                        $('#pais').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                } else {
                    $('#pais').empty();
                }
            }
        });
    });

    $('#pais').change(function() {
        var paisID = $(this).val();
        if (paisID) {
            $.ajax({
                url: "{{ url('api/get-state-list') }}?pais_id=" + paisID,
                type: "GET",
                success: function(res) {
                    if (res) {
                        $('#estado').empty();
                        $('#estado').append('<option>{{__("app.select")}}</option>');
                        $.each(res, function(key, value) {
                            $('#estado').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $('#estado').empty();
                    }
                }
            });
        } else {
            $("#estado").empty();
        }
        // Clear the municipality and city dropdowns
        $("#municipio").empty();
        $("#ciudad_id").empty();
        $("#clubes").empty();
    });

    $('#estado').change(function() {
        var estadoID = $(this).val();
        if (estadoID) {
            $.ajax({
                url: "{{ url('api/get-municipality-list') }}?estado_id=" + estadoID,
                type: "GET",
                success: function(res) {
                    if (res) {
                        $('#municipio').empty();
                        $('#municipio').append('<option>{{__("app.select")}}</option>');
                        $.each(res, function(key, value) {
                            $('#municipio').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $('#municipio').empty();
                    }
                }
            });
        } else {
            $("#municipio").empty();
        }
        // Clear the city dropdown
        $("#ciudad_id").empty();
        $("#clubes").empty();
    });

    $('#municipio').change(function() {
        var municipioID = $(this).val();
        if (municipioID) {
            $.ajax({
                url: "{{ url('api/get-city-list') }}?municipio_id=" + municipioID,
                type: "GET",
                success: function(res) {
                    if (res) {
                        $('#ciudad_id').empty();
                        $('#ciudad_id').append('<option>{{__("app.select")}}</option>');
                        $.each(res, function(key, value) {
                            $('#ciudad_id').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $('#ciudad_id').empty();
                    }
                }
            });
        } else {
            $("#ciudad_id").empty();
            $("#clubes").empty();
        }
    });

    $('#ciudad_id').change(function() {
        var ciudad_id = $(this).val();
        if (ciudad_id) {
            $.ajax({
                url: "{{ url('api/get-club-list') }}?ciudad_id=" + ciudad_id,
                type: "GET",
                success: function(res) {
                    if (res) {
                        $('#clubes').empty();
                        $('#clubes').append('<option>Select</option>');
                        $.each(res, function(key, value) {
                            $('#clubes').append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                }
            });
        } else {
            $("#clubes").empty();
        }
    });

    $('#clubes').change(function() {
        var ciudad_id = $(this).val();
        if (ciudad_id) {
            $('#submit-button').prop('disabled', false);
        } else {
            $("#submit-button").prop('disabled', true);
        }
    });
</script>
</html>
