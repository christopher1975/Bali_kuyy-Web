<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>

<body>
    <div class="container col-3 ">

        <form action="/register_admin" method="POST">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="loginName">Email</label>
                <input type="email" id="loginName" class="form-control" name="email" required />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="nama">Nama</label>
                <input type="text" id="nama" class="form-control" name="nama" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" required />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="/login">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>
