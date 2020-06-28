anchor(site_url('users/delete/$1'), '<button type="button" class="btn btn-danger "><i class="fa fa-trash tombol-hapus" aria-hidden="true"></i></button>')

<a href="<?= site_url('users/delete/$1'); ?>" class="btn btn-danger tombol-hapus" <i class="fa fa-trash" aria-hidden="true"></i></a>

 <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>'

 add_column('action', anchor(site_url('users/read/$1'),'<button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>')."  ".anchor(site_url('users/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>')."  ".anchor(site_url('users/delete/$1'),'<button type="button" class="btn btn-danger remove"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'username');

 add_column('action', '<a href="users/read/$1" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a> <a href="users/update/$1" class="btn btn-warning" ><i class="fa fa-pencil" aria-hidden="true" ></i></a> <a href="users/delete/$1" class="btn btn-danger"><i class="fa fa-trash"></i></a>','username');


 add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
