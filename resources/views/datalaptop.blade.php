<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous"
        />

        <!-- Toastr CSS -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <title>UTS | CRUD</title>
    </head>

    <body>
        <h1 class="text-center mb-4">Data Laptop</h1>
        <div class="container">
            <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif -->
            <a href="/tambahdata" type="button" class="btn btn-success"
                >Tambah Data +
            </a>
            <div class="row g-3 align-items-center mt-1">
                <div class="col-auto">
                    <form action="/laptop" method="GET">
                        <input
                            type="search"
                            name="search"
                            placeholder="search..."
                            id="inputKeyword"
                            class="form-control"
                            aria-describedby="passwordHelpInline"/>
                    </form>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Seri</th>
                            <th scope="col">Image</th>
                            <th scope="col">Tahun Produksi</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Diperbarui</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $row->brand }}</td>
                            <td>{{ $row->seri }}</td>
                            <td>
                                <a href="{{ $row->image }}">
                                    <img
                                        src="{{ $row->image }}"
                                        alt=""
                                        style="width: 40px"
                                    />
                                </a>
                            </td>
                            <td>{{ $row->tahun_produksi }}</td>
                            <td>{{ $row->created_at->diffForHumans() }}</td>
                            <td>{{ $row->updated_at->diffForHumans() }}</td>
                            <td>
                                <a
                                    href="/ubahdata/{{ $row->id }}"
                                    class="btn btn-primary"
                                    >Edit</a
                                >
                                <!-- <a href="/deletedata/{{ $row->id }}" class="btn btn-danger">Hapus</a> -->
                                <a
                                    href="#"
                                    class="btn btn-danger delete"
                                    data-id="{{ $row->id }}"
                                    data-brand="{{ $row->brand }}"
                                    data-seri="{{ $row->seri }}"
                                    >Hapus</a
                                >
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"
        ></script>

        <!-- Sweetalert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Jquerry -->
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
        ></script>

        <!-- Toastr -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    --></body>
    <script>
        $(".delete").click(function () {
            var itemId = $(this).attr("data-id");
            var brand = $(this).attr("data-brand");
            var brandSeri = $(this).attr("data-seri");
            swal({
                title: "Apakah anda yakin?",
                text:
                    "Setelah data dihapus, laptop " +
                    brand +
                    " seri " +
                    brandSeri +
                    " tidak akan ditampilkan kembali pada daftar laptop.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletedata/" + itemId + "";
                    swal("Sukses! Data produk berhasil dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data laptop tidak dihapus");
                }
            });
        });
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ session::get('success')}}");
        @endif
    </script>
</html>
