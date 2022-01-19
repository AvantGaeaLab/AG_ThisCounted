<html>
<head>
<title>{{config('app.name')}} | {{__('About')}}</title>
</head>

<body>
    <h1>Welcome to my website!, {{$username?? 'Friend!!'}} </h1>

    <a href="clear-my-name">Clear My name!</a>
</body>
</html>
