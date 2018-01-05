<!doctype html>
<html>
    <head>
	<title></title>
    </head>
    <body>
	<h1>Hello World</h1>
    @foreach ($items as $item)
        <li>{{ $item }}</li>
    @endforeach
    </body>
</html>
