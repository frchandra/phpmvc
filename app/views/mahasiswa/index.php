<div class="container mt-3">
	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash();?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
			  Tambah Mahasiswa
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<form action="<?=BASEURL;?>/Mahasiswa/cari" method="post">
			<div class="input-group mt-3">
			  <input type="text" class="form-control" placeholder="cari mahasiswa.." name="keyword" id="keyword">
			  <div class="input-group-append">
				<button class="btn btn-primary" type="submit" id="tombolCari" autocomplpete="off">cari</button>
			  </div>
			</div>
			</form>
		</div>
	</div>



	<div class="row">
		<div class="col-lg-6">				
			<h3>Daftar Mahasiswa</h3>			
				<ul class="list-group">
					<?php foreach ( $data['mhs'] as $mhs): ?>
						<li class="list-group-item ">
							<?= $mhs ['nama']?>
							<a href="<?= BASEURL;?>/Mahasiswa/hapus/<?= $mhs ['id'];?>" class="badge badge-danger float-right ml-1" onclick="confirm('yakin?');">hapus</a> 
							<a href="<?= BASEURL;?>/Mahasiswa/ubah/<?= $mhs ['id'];?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']?>">ubah</a>							
							<a href="<?= BASEURL;?>/Mahasiswa/detail/<?= $mhs ['id'];?>" class="badge badge-primary float-right ml-1">detail</a>							
						</li>
					<?php endforeach;?>
				</ul>			
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="<?=BASEURL;?>/Mahasiswa/tambah" method="post">
			 <input type="hidden" name="id" id="id">
			 <div class="form-group">
				<label for="nama">nama</label>
				<input type="text" class="form-control" id="nama" name="nama">
			  </div>       
			  <div class="form-group">
				<label for="no">no</label>
				<input type="number" class="form-control" id="no" name="no">
			  </div> 
			  <div class="form-group">
				<label for="email">email</label>
				<input type="text" class="form-control" id="email" name="email">
			  </div> 
			  <div class="form-group">
				<label for="jurusan">jursan</label>
				<select class="form-control" id="jurusan" name="jurusan">
				  <option value="ini jurusan 1">1</option>				
				  <option value="ini jurusan 2">2</option>				
				  <option value="ini jurusan 3">3</option>				
				</select>
			  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">tambah data</button>
		</form>
      </div>
    </div>
  </div>
</div>



