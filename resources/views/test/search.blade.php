<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Ajax Autocomplete Dynamic Search with select2</title>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .container {
            max-width: 500px;
        }

        h2 {
            color: white;
        }
    </style>

</head>

<body class="bg-primary">
<div class="container mt-5">
    <h2>Laravel AJAX Autocomplete Search with Select2</h2>
    <div class="input__field">
        <select class="livesearch" name="livesearch"></select>
    </div>
</div>
</body>

<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Select Dog',
        ajax: {
            url: '/api/autocomplete-search-sire',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                console.log(Array.isArray(data));

                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })

                };
            },
            cache: true
        }
    });
</script>
</html>
