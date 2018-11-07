<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('app.name', 'Cashback') }}</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.0/css/bulma.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-divider@1.0.1/dist/bulma-divider.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@1.0.14/bulma-tooltip/dist/bulma-tooltip.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.2/css/alertify.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>

<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<meta name="google-signin-client_id" content="{{ env('GOOGLE_CLIENT_ID') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">