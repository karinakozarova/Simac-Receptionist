<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<h1>{{$details['title']}}</h1>
<p>{{$details['body']}}</p>
<p>{{$details['companyName']}}</p>
<p>{{$details['departmentName']}}</p>
<p>{{$details['note']}}</p>
<p>Meeting time proposed by you</p>
<p>{{$details['proposed_start_dateTime']}}</p>
<p>{{$details['proposed_end_dateTime']}}</p>
<p>Thank you!</p>
</body>
</html>
