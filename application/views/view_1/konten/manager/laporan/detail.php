<div class="modal-dialog">
    <!-- konten modal-->
    <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Data Penjualan</h4>
        </div>
        <!-- body modal -->
        <div class="modal-body">
            <table width="100%" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="5%">Id Penjualan</th>
                                                        <th width="5%">Id Stok</th>
                                                        <th width="17%">Harga Jual</th>
                                                        <th width="17%">Qty</th>
                                                        <th width="17%">Total Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no_hari = 1;
                                                    foreach($hari as $row_hari){
                                                    ?>
                                                    <tr>
                                                        <td><?= $no_hari++; ?></td>
                                                        <td><?= $row_hari->id_penjualan; ?></td>
                                                        <td><?= $row_hari->id_stok_b; ?></td>
                                                        <td><?= $row_hari->harga_jual; ?></td>
                                                        <td><?= $row_hari->qty; ?></td>
                                                        <td><?= $row_hari->total_hrg; ?></td> 
                                                    </tr>
                                                    <?php   
                                                    }
                                                    ?>
                                                </tbody>                                            
                                            </table>
         </div> 
        <!-- footer modal -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
        </div>
    </div>
</div>