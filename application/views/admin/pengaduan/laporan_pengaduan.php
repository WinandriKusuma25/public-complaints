<!DOCTYPE html>
<html>

<!-- <head>
    <title></title>
    <h6 style="font-size:3rem;text-align:center;margin:0;padding:0">Baiti Jannati</h6><br>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
</head> -->
<style type="text/css">
.kop-surat {
    line-height: 50%;
}

table {
    margin: auto;


}
</style>

<body>
    <table>
        <tr>

            <td style=" text-align: center;">
                <div class="kop-surat">
                    <center>
                        <a><b>Laporan Pengaduan</b></a>
                    </center>
                </div>
            </td>
        </tr>
    </table>
    <hr>
    <div>

        <b>
            <p style="text-align:center;margin:0;padding:0">Daftar Pengaduan</p>
        </b>
        <br>
        <table width="100%" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Tgl.Pengaduan</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $no = 1;
        foreach ($pengaduan as $u) : ?>

                <tr align="center">
                    <td><?= $no++ ?></td>
                    <td><?= $u->nama ?></td>
                    <td><?= $u->nik ?></td>
                    <td><?= $u->nama_kategori ?></td>
                    <td><?= $u->judul ?></td>
                    <td><?=  date('d-m-Y H:i:s', strtotime($u->created_at)); ?></td>
                    <?php if ($u->status == 'disetujui') :  ?>
                    <td class="project-state">
                        <span class="badge badge-success"><?= $u->status ?></span>
                    </td>
                    <?php elseif ($u->status == 'diajukan') :  ?>
                    <td class="project-state">
                        <span class="badge badge-warning"><?= $u->status ?></span>
                    </td>

                    <?php else : ?>
                    <td class="project-state">
                        <span class="badge badge-danger"><?= $u->status ?></span>
                    </td>
                    <?php endif ?>



                    <?php if ($u->tanggapan == null) :  ?>
                    <td class="project-state">
                        <span class="badge badge-info">Belum ada tanggapan</span>
                    </td>
                    <?php else : ?>
                    <td class="project-state">
                        <?= $u->tanggapan ?>
                    </td>
                    <?php endif ?>


                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</body>

</html>