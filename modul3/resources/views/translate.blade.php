<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transalation</title>
</head>
<body>
    <form action="/trans">
    <p><label for="">Input word</label><input type="text" placeholder="Input any words" name="word"></p>
    <p><input type="submit" value="Dịch" name="submit"></p>
    </form>
    <div>
        @if (isset($word) && isset($dich))
    <p> Nghĩa của từ '{{$word}}' là '{{$dich}}'</p>
        @endif
    </div>
</body>
</html>