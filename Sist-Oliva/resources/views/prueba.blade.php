<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="accordion" id="miAcordeon">
            <div class="accordion-item">
                <h2 class="accordion-header" id="seccion1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#contenido1" aria-expanded="true" aria-controls="contenido1">
                        Título de la sección 1
                    </button>
                </h2>
                <div id="contenido1" class="accordion-collapse collapse show" aria-labelledby="seccion1"
                    data-bs-parent="#miAcordeon">
                    <div class="accordion-body">
                        Contenido de la sección 1
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="seccion2">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#contenido2" aria-expanded="false" aria-controls="contenido2">
                        Título de la sección 2
                    </button>
                </h2>
                <div id="contenido2" class="accordion-collapse collapse" aria-labelledby="seccion2"
                    data-bs-parent="#miAcordeon">
                    <div class="accordion-body">
                        Contenido de la sección 2
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
