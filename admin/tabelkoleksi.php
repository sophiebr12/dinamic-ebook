<?php
include 'koneksi.php';
$sql = "select * from koleksi";
$hasil =  mysqli_query($conn, $sql);
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Headings-->

                    <!-- DataTales Example -->
                    <div class="shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row p-3 flex justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-book" aria-hidden="true"></i>Koleksi Bacaan</h6>
                                <button type="button" class="btn btn-primary" id="btnTambahKoleksi" data-bs-toggle="modal" data-bs-target="#modalAddKoleksi">Tambah</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Tahun Terbit</th>
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>File</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <?php
                                        if (mysqli_num_rows($hasil) > 0) {
                                            while ($isi = mysqli_fetch_assoc($hasil)) {
                                                echo '<tr><td>';
                                                echo $isi["kode_kol"];
                                                echo '</td><td>';
                                                echo $isi["judul_kol"];
                                                echo '</td><td>';
                                                echo $isi["penulis"];
                                                echo '</td><td>';
                                                echo $isi["tahun_terbit"];
                                                echo '</td><td>';
                                                echo $isi["kategori_kol"];
                                                echo '</td><td>';
                                                echo $isi["deskripsi"];
                                                echo '</td><td>';
                                                echo $isi["file"];
                                                echo '</td><td>';
                                                echo '<button class="btnUpdateKoleksi btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ModalUpdateKoleksi" data-kode="' . $isi["kode_kol"] . '">Edit</button>';
                                                echo '</td></tr>';
                                            }
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Modal Tambah Barang-->
    <div class="modal" tabindex="-1" id="modalAddKoleksi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Koleksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div id="formKoleksi">
                        <form target="_blank" method="post" autocomplete="on" enctype="multipart/form-data">

                            <label for="kode" class="form-label">Kode:</label>
                            <input type="text" id="kodekoladd" class="form-control">

                            <label for="nama" class="form-label">Judul:</label>
                            <input type="text" id="judulkoladd" class="form-control"><br>

                            <label for="satuan" class="form-label">Penulis:</label>
                            <input type="text" id="penulisadd" class="form-control"><br>

                            <label for="hargabeli" class="form-label">Tahun Terbit:</label>
                            <input type="text" id="thnterbitadd" class="form-control"><br><br>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Kategori</span>
                                <?php
                                include 'koneksi.php';
                                $sql = "select nama_kat from kategori_koleksi";
                                $hasil =  mysqli_query($conn, $sql);
                                ?>
                                <select class="custom-select" id="kategoriadd">
                                    <?php
                                    if (mysqli_num_rows($hasil) > 0) {
                                        while ($isi = mysqli_fetch_assoc($hasil)) {
                                            $idkodebr = $isi["kode_kat"];
                                            echo '<option>';
                                            echo $isi["nama_kat"];
                                            echo '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <label for="deskripsi" class="form-label deslb" id="deslb">Deskripsi:</label>
                            <textarea name="deskripsi" id="desadd" cols="40" rows="5"></textarea><br><br>

                            <label for="file" class="form-label">File:</label>
                            <input type="file" id="fileadd" class="form-control" name="file"><br><br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="modalAddKoleksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddKoleksi" aria-hidden="true">
        <div  class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Barang</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div id="formKoleksi">
                    <form target="_blank" method="post" autocomplete="on">
                        
                        <label for="kode" class="form-label">Kode:</label>
                        <input type = "text" id="kodekoladd"  class="form-control">
                        
                        <label for="nama" class="form-label">Judul:</label>
                        <input type = "text" id="judulkoladd" class="form-control"><br>
                        
                        <label for="satuan" class="form-label">Penulis:</label>
                        <input type = "text" id="penulisadd" class="form-control"><br>
                        
                        <label for="hargabeli" class="form-label">Tahun Terbit:</label>
                        <input type = "text" id="thnterbitadd" class="form-control"><br><br>

                        <div class="input-group mb-3">
                                <span class="input-group-text" >Kategori</span>
                                <?php
                                include 'koneksi.php';
                                $sql = "select nama_kat from kategori_koleksi";
                                $hasil =  mysqli_query($conn, $sql);
                                ?>
                                <select class="custom-select" id="kategoriadd">
                                <?php
                                if (mysqli_num_rows($hasil) > 0) {
                                    while ($isi = mysqli_fetch_assoc($hasil)) {
                                        $idkodebr = $isi["kode_kat"];
                                        echo '<option>';
                                        echo $isi["nama_kat"];
                                        echo '</option>';
                                    }
                                }
                                ?>
                                </select>
                        </div>
                        
                    </form>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="save" >Save</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                
                <!-- <button type="button" class="btn btn-success" data-bs-dismiss="modal" name="save" id="save" >Save</button> -->
    </div>
    </div>
    </div>
    </div> -->
    <!-- ---------------------------- -->

    <!-- Modal Update Barang-->
    <div class="modal fade" id="ModalUpdateKoleksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Koleksi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div id="formKoleksi">
                        <form target="_blank" method="post" autocomplete="on" enctype="multipart/form-data">
                            <div>
                                <label for="kode" class="form-label">Kode:</label>
                                <input type="text" id="kodekol" readonly class="form-control">
                            </div>

                            <label for="nama" class="form-label">Judul:</label>
                            <input type="text" id="judulkol" class="form-control"><br>


                            <label for="satuan" class="form-label">Penulis:</label>
                            <input type="text" id="penulis" class="form-control"><br>

                            <label for="hargabeli" class="form-label">Tahun Tebit:</label>
                            <input type="text" id="thnterbit" class="form-control"><br><br>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Kategori</span>
                                <?php
                                include 'koneksi.php';
                                $sql = "select nama_kat from kategori_koleksi";
                                $hasil =  mysqli_query($conn, $sql);
                                ?>
                                <select class="custom-select" id="kategori">
                                    <?php
                                    if (mysqli_num_rows($hasil) > 0) {
                                        while ($isi = mysqli_fetch_assoc($hasil)) {
                                            $idkodebr = $isi["kode_kat"];
                                            echo '<option>';
                                            echo $isi["nama_kat"];
                                            echo '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <label for="deskripsi" class="form-label deslb" id="deslb">Deskripsi:</label>
                            <textarea name="deskripsi" id="des" cols="40" rows="5"></textarea><br><br>

                            <label for="file" class="form-label">File:</label>
                            <input type="file" id="file" class="form-control" name="file"><br><br>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="delete">Delete</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="update">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------- -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>




    <script>
        $(document).ready(function() {
            $('#save').click(function() {
                var form_data = new FormData();
                form_data.append('kode_kol', $('#kodekoladd').val());
                form_data.append('judul_kol', $('#judulkoladd').val());
                form_data.append('penulis', $('#penulisadd').val());
                form_data.append('tahun_terbit', $('#thnterbitadd').val());
                form_data.append('kategori_kol', $('#kategoriadd').val());
                form_data.append('deskripsi', $('#desadd').val());
                form_data.append('file', $('#fileadd')[0].files[0]);

                $.ajax({
                    url: 'simpankoleksi.php',
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert("sukses");
                        $('#content').load("tabelkoleksi.php");
                    }
                });
            });


            // $('#save').click(function() {
            //     var kd = $('#kodekoladd').val();
            //     var jd = $('#judulkoladd').val();
            //     var pn = $('#penulisadd').val();
            //     var tt = $('#thnterbitadd').val();
            //     var kt = $('#kategoriadd').val();
            //     var dk = $('#desadd').val();
            //     var fl = $('#fileadd').val();
            //     console.log(kd);
            //     console.log(jd);
            //     console.log(pn);
            //     console.log(tt);
            //     console.log(kt);
            //     console.log(dk);
            //     console.log(fl);
            //     $.post("simpankoleksi.php", {
            //         kode_kol: kd,
            //         judul_kol: jd,
            //         penulis: pn,
            //         tahun_terbit: tt,
            //         kategori_kol: kt,
            //         deskripsi: dk,
            //         file: fl
            //     }, function(data, status) {
            //         alert("sukses");
            //         $('#content').load("tabelkoleksi.php");
            //     });
            // });

            $('#update').click(function() {
                var form_data = new FormData();
                form_data.append('kode_kol', $('#kodekol').val());
                form_data.append('judul_kol', $('#judulkol').val());
                form_data.append('penulis', $('#penulis').val());
                form_data.append('tahun_terbit', $('#thnterbit').val());
                form_data.append('kategori_kol', $('#kategori').val());
                form_data.append('deskripsi', $('#des').val());
                form_data.append('file', $('#file')[0].files[0]);

                $.ajax({
                    url: 'ubahkoleksi.php',
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert("sukses");
                        $('#content').load("tabelkoleksi.php");
                    }
                });
            });


            $("#dataTable").on("click", ".btnUpdateKoleksi", function() {
                let kodekol = $(this).data("kode");
                console.log(kodekol);
                $.ajax({
                    url: 'ambildatakoleksi.php', // Buat file baru untuk mengambil data koleksi berdasarkan kode
                    type: 'POST',
                    data: {
                        kode_kol: kodekol
                    }, // Ubah dari kode_kol menjadi kodekol
                    success: function(data) {
                        let koleksi = JSON.parse(data);
                        // Isi nilai field di modal update dengan data dari server
                        $("#kodekol").val(koleksi.kode_kol);
                        $("#judulkol").val(koleksi.judul_kol);
                        $("#penulis").val(koleksi.penulis);
                        $("#thnterbit").val(koleksi.tahun_terbit);
                        $("#kategori").val(koleksi.kategori_kol);
                        $("#des").val(koleksi.deskripsi);

                        if (koleksi.file) {
                            // Hapus nilai file sebelumnya, jika ada
                            $("#file").val('');
                            $("#file").val(koleksi.file);
                            // $("#file").text(koleksi.file);
                            // Tampilkan nama file pada label atau elemen lain sesuai kebutuhan
                            // Misalnya, Anda memiliki elemen dengan ID 'fileNameLabel':
                            // $("#fileNameLabel").text(koleksi.file);

                            // Atau langsung isi nilai file pada input file jika diperlukan
                            // $("#file").val(koleksi.file);
                        }
                    }
                });
            });




            // $('#update').click(function() {
            //     var kd = $('#kodekol').val();
            //     var jd = $('#judulkol').val();
            //     var pn = $('#penulis').val();
            //     var tt = $('#thnterbit').val();
            //     var kt = $('#kategori').val();
            //     console.log(kd);


            //     $.post("ubahkoleksi.php", {
            //         kode_kol: kd,
            //         judul_kol: jd,
            //         penulis: pn,
            //         tahun_terbit: tt,
            //         kategori_kol: kt
            //     }, function(data, status) {
            //         alert("sukses");
            //         $('#content').load("tabelkoleksi.php");
            //     });
            // });

                // Hapus data koleksi
                $("#delete").click(function() {
                    var kd = $('#kodekol').val();
                    var jd = $('#judulkol').val();
                    var pn = $('#penulis').val();
                    var tt = $('#thnterbit').val();
                    var kt = $('#kategori').val();
                    var dk = $('#des').val(); // Deskripsi

                    $.ajax({
                        url: 'hapuskoleksi.php',
                        type: 'POST',
                        data: {
                            kode_kol: kd,
                            judul_kol: jd,
                            penulis: pn,
                            tahun_terbit: tt,
                            kategori_kol: kt,
                            deskripsi: dk
                        },
                        success: function(data, status) {
                            alert("Data berhasil dihapus");
                            $('#content').load("tabelkoleksi.php");
                        }
                    });
                });




            // $('#delete').click(function() {
            //     var kd = $('#kodekol').val();
            //     var jd = $('#judulkol').val();
            //     var pn = $('#penulis').val();
            //     var tt = $('#thnterbit').val();
            //     var kt = $('#kategori').val();
            //     console.log(kd);
            //     $.post("hapuskoleksi.php", {
            //         kode_kol: kd,
            //         judul_kol: jd,
            //         penulis: pn,
            //         tahun_terbit: tt,
            //         kategori_kol: kt
            //     }, function(data, status) {
            //         alert("sukses");
            //         $('#content').load("tabelkoleksi.php");
            //     });
            // });




            $("#dataTable").on("click", ".btnUpdateKoleksi", function() {
                // $("#kodebr").val("tess");
                let closestTR = $(this).closest("tr").children(0);
                let kodekol = closestTR.eq(0).text();
                let judulkol = closestTR.eq(1).text();
                let penulis = closestTR.eq(2).text();
                let thnterbit = closestTR.eq(3).text();
                let kategorikol = closestTR.eq(4).text();
                let deskripsi = closestTR.eq(5).text();

                $("#kodekol").val(kodekol);
                console.log($("#kodekol").val());

                // ambil value (id) dari select
                let currentSelect = $(this);
                let id = currentSelect.val();

                $("#judulkol").val(judulkol);
                $("#penulis").val(penulis);
                $("#thnterbit").val(thnterbit);
                $("#kategori").val(kategorikol);
                $("#des").val(deskripsi);
            });


        });
    </script>


</body>