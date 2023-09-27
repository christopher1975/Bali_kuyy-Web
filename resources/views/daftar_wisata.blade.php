<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    </style>
</head>

<body>
    <div class="sidebar-wrapper">
        <div class="list-group">
            <a href="/" class="list-group-item list-group-item-action disabled">BaliKuyy</a>
            <a href="/" class="list-group-item list-group-item-action ">
                <span><i class="fa-solid fa-house"></i></span>Home
            </a>
            <a href="/daftar_wisata" class="list-group-item list-group-item-action active">
                <span>
                    <i class="fa-solid fa-map-location"></i></span>Daftar wisata
            </a>
            <a href="/daftar_event" class="list-group-item list-group-item-action ">
                <span><i class="fa-solid fa-calendar-day"></i></span>Daftar event
            </a>
            <a href="/tambah_wisata" class="list-group-item list-group-item-action">
                <span><i class="fa-solid fa-plus"></i></i></span>Tambah Wisata
            </a>
            <a href="/tambah_event" class="list-group-item list-group-item-action">
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
        <h1 class="text-center mt-4 mb-4">Daftar wisata</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama wisata</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_wisata as $wisata)
                    <tr>
                        <td>{{ $wisata->nama_wisata }}</td>
                        <td>{{ $wisata->alamat }}</td>
                        <td>{{ $wisata->deskripsi }}</td>
                        <td class="d-flex">
                            <a href="/edit_wisata/{{ $wisata->id }}">
                                <button type="button" class="btn btn-warning mr-2">Edit</button>
                            </a>
                            <form action="/hapus_wisata" method="post">
                                @csrf
                                <input type="hidden" value="{{ $wisata->id }}" name="id">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
