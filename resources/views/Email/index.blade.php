<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>

<body>
    <div class="p-5 col-md-4 offset-md-4">
        <h4>Send Mail</h4>
        <form action="{{route('sendmail')}}" method="post" accept-charset="utf-8">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Subject</label>
                <input type="text" class="form-control" name="subject">
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" id="" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Send mail</button>
            </div>
        </form>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>