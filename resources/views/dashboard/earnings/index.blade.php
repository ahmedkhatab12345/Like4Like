<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Profits Chart</title>
    {!! $chart->renderHtml() !!}
</head>
<body>
    <div>
        {!! $chart->container() !!}
    </div>

    {!! $chart->script() !!}
</body>
</html>
