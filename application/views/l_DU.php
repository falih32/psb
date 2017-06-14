<?php   $role = $this->session->userdata('id_role'); 

    switch ($kelompok) {
        case "1":
            $Judul = "DU Kelompok I";
            $SubJudul = "DU Kelompok I";
            $linkAjax =  site_url('DaftarUlang/ajaxProcessDaftarUlang/1');
            break;
        case "2":
            $Judul = "DU Kelompok II";
            $SubJudul = "DU Kelompok II";
            $linkAjax =  site_url('DaftarUlang/ajaxProcessDaftarUlang/2');
            break;
        case "3":
            $Judul = "DU Kelompok III";
            $SubJudul = "DU Kelompok III";
            $linkAjax =  site_url('DaftarUlang/ajaxProcessDaftarUlang/3');
             break;
        case "4":
            $Judul = "DU Kelompok IV";
            $SubJudul = "DU Kelompok IV";
            $linkAjax =  site_url('DaftarUlang/ajaxProcessDaftarUlang/4');
            break;
        case "5":
            $Judul = "DU Kelompok V";
            $SubJudul = "DU Kelompok V";
            $linkAjax =  site_url('DaftarUlang/ajaxProcessDaftarUlang/5');
            break;
        case "6":
            $Judul = "DU Kelompok VI";
            $SubJudul = "DU Kelompok VI";
            $linkAjax =  site_url('DaftarUlang/ajaxProcessDaftarUlang/6');
            break;
        case "7":
            $Judul = "DU Kelompok VII";
            $SubJudul = "DU Kelompok VII";
            $linkAjax =  site_url('DaftarUlang/ajaxProcessDaftarUlang/7');
            break;
        
        default:
            $Judul = "DU Semua Kelompok";
            $SubJudul = "DU Semua Kelompok";
            $linkAjax =  site_url('DaftarUlang/ajaxProcessDaftarUlang/-1');
    }       
?>
<div class="container-fluid">
    <div class="row-fluid">
        <h1>
            <i class="fa fa-users"></i> <?php echo $Judul; ?>
            
        </h1>
        <hr>
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-users"></i> <?php echo $SubJudul; ?>
            </div>
            <div class="panel-body">
            </div>
            <table class="table table-responsive table-hover table-striped" id="tabel-surat">
            	<thead>
                <tr>
                	<th>No Pendaftaran</th>
                        <th>Nama Lengkap</th>
                        
                        <th>Alamat</th>
                        <th>Kecamatan</th>
                        <th>Kota</th>
                        <th>Diterima dikelas</th>
                        <th>Catatan Pendaftaran</th>
                        <th>Aksi</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
<!--
    function makeConfirmation(){
	var deleteLinks = document.querySelectorAll('.delete');
	for (var i = 0, length = deleteLinks.length; i < length; i++) {
            deleteLinks[i].addEventListener('click', function(event) {
                event.preventDefault();

                var choice = confirm(this.getAttribute('data-confirm'));

                if (choice) {
                    window.location.href = this.getAttribute('href');
                }
            });
	}
    }

    function makeTooltip(){
	$('[data-toggle="tooltip"]').tooltip({});
    }

    function fixedButton(){
        $('.btn-aksi').width(
            Math.max.apply( 
                Math, 
                $('.btn-aksi').map(function(){
                    return $(this).outerWidth();
                }).get()
            )
        );
    }

$(document).ready(function() {
	
	var table = $('#tabel-surat').DataTable( {
    	"paging": true, 
		"search":true,
                "scrollX":true,
		"ordering": true, 
		"responsive": false,
		"processing":true, 
		"serverSide": true,
                "pageLength": 50,
		"ajax":{
			"url":"<?php echo $linkAjax; ?>",
			"type":"POST"
		},
		"columns": [
                
                
                
                { "data": "tmb_no_daftar" }, //0
                { "data": "tmb_nama" }, //1
                { "data": "tmb_alamat" }, //2
                { "data": "tmb_kec" }, //3
                { "data": "tmb_kota" }, //4
                { "data": "tmb_diterimadi" }, //5
                { "data": "tmb_keterangan" }, //6              
                
                { "data": "aksi" }, //7
                { "data": "tmb_id" } //8
              ],
		"columnDefs": [
				{ "searchable": false, "orderable":false, "targets": [7] },
				{ "searchable": false, "visible":false, "targets": [8] }
             
			],
		"order": [[ 8, "asc" ]],
		"drawCallback": function( settings ) {
			makeConfirmation();
			makeTooltip();
                        fixedButton();
		},
                "createdRow": function ( row, data, index ) {
                $(row).click(function(){window.location.href = '<?php echo site_url('DaftarUlang/detail_siswa').'/'; ?>'+data.tmb_id;});
                $(row).css('cursor', 'pointer');
                
                $(row).find('a').click(function(e){e.stopPropagation();});
               
                }
                
                
                
	} );




  function makeConfirmation(){
                var deleteLinks = document.querySelectorAll('.delete');
                for (var i = 0, length = deleteLinks.length; i < length; i++) {
                        deleteLinks[i].addEventListener('click', function(event) {
                                event.preventDefault();

                                var choice = confirm(this.getAttribute('data-confirm'));

                                if (choice) {
                                        window.location.href = this.getAttribute('href');
                                }
                        });
                }

                var confirmLinks = document.querySelectorAll('.confirm');
                for (var i = 0, length = confirmLinks.length; i < length; i++) {
                        confirmLinks[i].addEventListener('click', function(event) {
                                event.preventDefault();

                                var choice = confirm(this.getAttribute('data-confirm'));

                                if (choice) {
                                        $.ajax({
                                                url: this.getAttribute('data-href'),
                                                type: "POST",
                                                success: function(){table.draw();}
                                        });
                                }
                        });
                }
        }
//     $('#tabel-pengadaan tr td:not(:last-child)').click(function ()    {
//                    location.href = $(this).parent().find('td a').attr('href');
//                   });
    function makeTooltip(){
	$('[data-toggle="tooltip"]').tooltip({});
    }

    function fixedButton(){
        $('.btn-aksi').width(
            Math.max.apply( 
                Math, 
                $('.btn-aksi').map(function(){
                    return $(this).outerWidth();
                }).get()
            )
        );
    }
    
     function moveSearch(){
                var newParent = document.getElementById('tabel-surat_filter');
                var oldParent = document.getElementById('date_search');

                while (oldParent.childNodes.length > 0) {
                        newParent.appendChild(oldParent.childNodes[0]);
                }
        }


});
</script>