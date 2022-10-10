<h2>
  Pengaturan
</h2>

<div class="card" style="max-width: 100%; color:rgb(212, 211, 255);">
  <div class="card-header" style="color:rgb(255, 255, 255); background-color:rgb(97, 96, 133);">Koleksi Buku</div>
  <div class="card-body">
    <table class="table table-striped" id="storage-datatable" style="max-width:100%">
      <thead>
      <tr>
        <th>Kelas</th>
        <th>Link Google Drive</th>
        <th>Dibuat pada</th>
        <th>Diperbarui pada</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php foreach ($data['bookData'] as $dataBuku) { ?>
          <tr>
            <td>{{$dataBuku->kelas}}</td>
            <td><a href="{{$dataBuku->storage_link}}" target="_blank">{{$dataBuku->storage_link}}</a></td>
            <td>{{date("l, d M Y", strtotime($dataBuku->created_at))}}</td>
            <td>{{date("l, d M Y", strtotime($dataBuku->updated_at))}}</td>
            <td class="row">
              <div class="col-sm-12">
                  <!-- Button trigger modal -->
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#storage-edit{{$dataBuku->id}}">
                Edit
              </button>

              <!-- Modal -->
              <div class="modal fade mt-5" id="storage-edit{{$dataBuku->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="link-update-modal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="link-update-modal">Edit Koleksi</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="<?=site_url()?>/wp-json/perpustakaan/update-collection" method="POST">
                        <div class="mb-3">
                          <input type="hidden" name="crlf-token" value="{{$crlf}}">
                          <input type="hidden" name="id" value="{{$dataBuku->id}}">
                          <label for="kelas" class="form-label">Kelas</label>
                          <input type="text" class="form-control" id="kelas" placeholder="1" name="kelas" value="{{$dataBuku->kelas}}">
                          <label for="link" class="form-label">Link Terbaru</label>
                          <input type="text" value="{{$dataBuku->storage_link}}" class="form-control" id="link" placeholder="https://drive.google.com/url...." name="link">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button class="btn btn-primary" type="submit">Perbarui Data</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div class="col-sm-12">
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-storage-link{{$dataBuku->id}}">
                    Hapus
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade mt-5" id="delete-storage-link{{$dataBuku->id}}" tabindex="-1" aria-labelledby="delete-storage-link{{$dataBuku->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="delete-storage-link{{$dataBuku->id}}">Peringatan</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah anda yakin untuk menghapus koleksi buku untuk kelas {{$dataBuku->kelas}} ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <form action="<?=site_url()?>/wp-json/perpustakaan/delete-collection" method="POST">
                            <input type="hidden" name="id" value="{{$dataBuku->id}}">
                            <input type="hidden" name="crlf-token" value="{{$crlf}}">
                            <button class="btn btn-danger" type="submit">Yakin! Hapus Data</button>
                          </form>
                        </div>
                      </div>
                    </div>
              </div>
          </td>
          </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Kelas</th>
          <th>Link Google Drive</th>
          <th>Dibuat pada</th>
          <th>Diperbarui pada</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<div class='modal fade mt-5' id='storage-add' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='link-update-modal' aria-hidden='true'>
  <div class='modal-dialog'> 
    <div class='modal-content'> 
      <div class='modal-header'> 
        <h1 class='modal-title fs-5' id='link-add-modal'>Tambah Koleksi Buku</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button> 
      </div> <div class='modal-body'> 
        <form action='<?=site_url()?>/wp-json/perpustakaan/store-collection' method='POST'> 
          <div class='mb-3'> 
            <input type='hidden' name='crlf-token' value='{{$crlf}}'> 
            <label for='kelas' class='form-label' style='color: black;'>Kelas</label> 
            <input type='text' class='form-control' id='kelas' placeholder='1' name='kelas'> 
            <label for='link' class='form-label' style='color: black;'>Link Penyimpanan Awan</label> 
            <input type='text' class='form-control' id='link' placeholder='https://drive.google.com/url....' name='link'> 
          </div> 
        </div> 
        <div class='modal-footer'> 
          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button> 
          <button class='btn btn-primary' type='submit'>Simpan</button> 
        </form> 
      </div> 
    </div> 
  </div> 
</div>