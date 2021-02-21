@extends('twill::layouts.form')

@push('extra_css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">

@endpush
@push('extra_js_head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endpush

@section('contentFields')
    @formField('input', [
    'name' => 'name',
    'label' => 'Name',
    'maxlength' => 100
    ])

    {{--    SIRE--}}
    {{--    @formField('browser', [--}}
    {{--    'moduleName' => 'dogs',--}}
    {{--    'name' => 'sire_id',--}}
    {{--    'label' => 'Sire'--}}
    {{--    ])--}}
    {{--    DAM--}}
    {{--    @formField('browser', [--}}
    {{--    'moduleName' => 'dogs',--}}
    {{--    'name' => 'sire_id',--}}
    {{--    'label' => 'Sire',--}}
    {{--    'max' => '1'--}}
    {{--    ])--}}



    <div class="input" style="margin-top: 35px;">
        <label for=""
               class="input__label"> Sire
        </label>
        <div class="input__field">
            <select class="sire form-control form-select" name="sire_id">
            </select>
        </div>
    </div>

    <div class="input" style="margin-top: 35px;">
        <label for=""
               class="input__label"> Dam
        </label>
        <div class="input__field">
            <select class="dam form-control form-select" name="dam_id">
            </select>
        </div>
    </div>

    @formField('select', [
    'name' => 'office',
    'label' => 'Office',
    'placeholder' => 'Select an office',
    'options' => [
    [
    'value' => 1,
    'label' => 'New York'
    ],
    [
    'value' => 2,
    'label' => 'London'
    ],
    [
    'value' => 3,
    'label' => 'Berlin'
    ]
    ]
    ])
    @formField('input', [
    'name' => 'callname',
    'label' => 'Call Name',
    'maxlength' => 100
    ])
    @formField('radios', [
    'name' => 'sex',
    'label' => 'Sex',
    'default' => 'm',
    'inline' => true,
    'options' => [
    [
    'value' => 'm',
    'label' => 'Male'
    ],
    [
    'value' => 'f',
    'label' => 'Female'
    ]
    ]
    ])

    @formField('date_picker', [
    'name' => 'dob',
    'label' => 'Date of Birth'
    ])

    @formField('input', [
    'name' => 'pretitle',
    'label' => 'Pre titles',
    'maxlength' => 100
    ])

    @formField('input', [
    'name' => 'posttitle',
    'label' => 'Post Titles',
    'maxlength' => 100
    ])

    @formField('input', [
    'name' => 'reg',
    'label' => 'Registration #',
    'maxlength' => 100
    ])
    @formField('input', [
    'name' => 'color',
    'label' => 'Colors',
    'maxlength' => 100
    ])
    @formField('input', [
    'name' => 'markings',
    'label' => 'Markings',
    'maxlength' => 100
    ])
    @formField('input', [
    'name' => 'website',
    'label' => 'Website',
    'maxlength' => 100
    ])
    @formField('input', [
    'name' => 'breeder',
    'label' => 'Breeder',
    'maxlength' => 100
    ])
    @formField('input', [
    'name' => 'owner',
    'label' => 'Owner(s)',
    'maxlength' => 100
    ])
@endsection

@push('extra_js')
    <script>
        $('.sire').select2({
            placeholder: 'Select Sire',
            ajax: {
                url: '/api/autocomplete-search-sire',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    if (!Array.isArray(data))
                        data = [data]
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

        $('.dam').select2({
            placeholder: 'Select Dam',
            ajax: {
                url: '/api/autocomplete-search-dam',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    if (!Array.isArray(data))
                        data = [data]
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
@endpush
