
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
      <div class="d-flex justify-content-start mb-4">
        <a href="<?= base_url('EvaluasiKerja')?>" class="btn btn-warning"><i class="fa fa-angles-left"></i> kembali</a>
      </div>
      </div>
      <div class="card-body table-responsive no-padding">
      <?php foreach ($list_data as $ld): ?>
        <div class="row">
          <div class="col sm-6">
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-3 col-form-label">Nama Peserta</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $ld->nama_peserta?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-3 col-form-label">Divisi</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $ld->bagian?>">
              </div>
            </div>
          </div>
          <div class="col sm-6">
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-3 col-form-label">Nilai</label>
              <div class="col-sm-8">
                <?php foreach($total as $t):
                $total_nilai = (($t->total1+$t->total2+$t->total3+$t->total4+$t->total5+$t->total6)/6)/COUNT($hasil) 
                ?>
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=  round($total_nilai,2) ?>">
                <?php endforeach; ?>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-3 col-form-label">Kesimpulan</label>
              <div class="col-sm-8">
                <?php 
                switch ($total_nilai) {
                  case ($total_nilai <= 100 && $total_nilai >= 90):?>
                    <span class="badge text-bg-success">Baik Sekali</span> <span class="badge text-bg-success">Dipertahankan 12 Bulan</span> 
                  <?php  break;
                  case ($total_nilai <= 80 && $total_nilai >= 70):?>
                    <span class="badge text-bg-success">Baik</span> <span class="badge text-bg-info">Dipertahankan 6 Bulan</span> 
                  <?php break;
                  case ($total_nilai <= 60 && $total_nilai >= 50) ?>
                    <span class="badge text-bg-warning">Kurang</span> <span class="badge text-bg-warning">Dipertahankan 3 Bulan</span> 
                  <?php break; 
                  default:?>
                    <span class="badge text-bg-danger">Kurang sekali</span>
                  <?php } ?>
              </div>
            </div>            
          </div>
        </div>
      <?php endforeach;?>
      <hr></hr>

      <table class="table table-hover">
          <thead>
          <tr>
            <th width="200px">Nama Penguji</th>
            <th width="200px">Jabatan dan Bagian</th>
            <th class="text-center">Penyajian Materi</th>
            <th class="text-center">Pengetahuan Teknis/Kerja</th>
            <th class="text-center">Hasil Kerja</th>
            <th class="text-center">Daya Analisa</th>
            <th width="150px" class="text-center">Inisiatif & Problem Solving</th>
            <th class="text-center">Kemampuan Kominikasi</th>
            <th class="text-center">kelebihan</th>
            <th class="text-center">kekurangan</th>
            <th class="text-center">rekomendasi</th>
          </tr>
          </thead>
          <?php
              foreach ($hasil as $h): 
              ?>
          <tbody>
            <tr>
              <td><?= $h->nama_penilai ?></td>
              <td><?= $h->jabatan_bagian ?></td>
              <td class="text-center"><?= $h->parameter1 ?></td>
              <td class="text-center"><?= $h->parameter2 ?></td>
              <td class="text-center"><?= $h->parameter3 ?></td>
              <td class="text-center"><?= $h->parameter4 ?></td>
              <td class="text-center"><?= $h->parameter5 ?></td>
              <td class="text-center"><?= $h->parameter6 ?></td>
              <td><?= $h->kelebihan ?></td>
              <td><?= $h->kekurangan ?></td>
              <td><?= $h->rekomendasi ?> Bulan</td>
            </tr>
          </tbody>
          <?php endforeach; ?>
          <tfoot>
            <?php foreach($total as $t):?>
            <tr>
              <td colspan="2" class="text-end"><b>total</b></td>
              <td class="text-center"><b><?= $t->total1 ?></b></td>
              <td class="text-center"><b><?= $t->total2 ?></b></td>
              <td class="text-center"><b><?= $t->total3 ?></b></td>
              <td class="text-center"><b><?= $t->total4 ?></b></td>
              <td class="text-center"><b><?= $t->total5 ?></b></td>
              <td class="text-center"><b><?= $t->total6 ?></b></td>
            </tr>
            <?php endforeach; ?>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>
<script>

  function refresh(){
    window.location.reload()
  }
</script>