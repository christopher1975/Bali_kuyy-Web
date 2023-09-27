<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            /* min-height: 100vh; */
        }

        html,
        body {
            height: 100%;
        }

        .list-group {
            border-radius: 0;
            height: 100%;
        }

        .sidebar-wrapper {
            background: #37200F;
            min-width: 200px;
            min-height: 100vh;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            max-width: 200px
        }

        .list-group-item.active {
            background: #7C5E48;
            border: none;

        }

        .list-group-item {
            background: #553C29;
            color: white;
            padding: 1.5rem;
        }

        .list-group-item span {
            margin-right: 0.5rem;
        }


        .list-group-item.disabled,
        .list-group-item:disabled {
            background: #37200F;
            color: white;
            font-weight: bolder;
            text-align: center;
            font-size: 1.5rem;
        }

        .container {
            margin-left: min(200px, auto);
        }

        .container {
            max-width: 500px;
            border-radius: 10px;
            padding: 1rem;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="sidebar-wrapper">
        <div class="list-group">
            <a href="/" class="list-group-item list-group-item-action disabled">BaliKuyy</a>
            <a href="/" class="list-group-item list-group-item-action ">
                <span><i class="fa-solid fa-house"></i></span>Home
            </a>
            <a href="/daftar_wisata" class="list-group-item list-group-item-action ">
                <span>
                    <i class="fa-solid fa-map-location"></i></span>Daftar wisata
            </a>
            <a href="/daftar_event" class="list-group-item list-group-item-action ">
                <span><i class="fa-solid fa-calendar-day"></i></span>Daftar event
            </a>
            <a href="/tambah_wisata" class="list-group-item list-group-item-action">
                <span><i class="fa-solid fa-plus"></i></i></span>Tambah Wisata
            </a>
            <a href="/tambah_event" class="list-group-item list-group-item-action active">
                <span><i class="fa-solid fa-plus"></i></i></span>Tambah Event
            </a>
            <a href="/daftar_feedback" class="list-group-item list-group-item-action ">
                <span><i class="fa-solid fa-star"></i></span>Daftar feedback
            </a>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="list-group-item list-group-item-action">
                    <span><i class="fa-solid fa-arrow-right-from-bracket"></i></span>Logout
                </button>
            </form>
        </div>
    </div>

    <div class="container">
        <form action="/tambah_event" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama event</label>
                <input type="text" class="form-control" name="nama_event" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" accept="image/*" required>
            </div>
            <div class="mb-3">
                <p>
                    <label>Choose file</label>
                </p>
                <input type="file" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

</body>

</html>
