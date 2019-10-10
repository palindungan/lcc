<?php 
/**
  * 
  */
class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('kasir/M_distributor');
        $this->load->model('pimpinan/M_barang');
    }
    function index(){
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/home/tampil');
    }
    function stok_habis()
    {
        $this->template->load('view_1/template/manager', 'view_1/konten/pimpinan/barang/stok_habis');
    }
    function tampil_stok()
    {
        $select = $this->input->post('pilih');
        $record_lcc = $this->M_barang->stok_habis_lcc()->result();
        $record_cmc = $this->M_barang->stok_habis_cmc()->result();
        $record_probolinggo = $this->M_barang->stok_habis_probolinggo()->result();        
        if($select=="T1")
        {
            echo '
            <div class="table-responsive">
            	<table width="100%" id="dt_custom1" class="table table-striped">
            		<thead>
            			<tr>
            				<th width="5%">No</th>
            				<th width="17%">Nama Barang</th>
            				<th width="25%">Stok Tersisa</th>
            			</tr>
            		</thead>
            		<tbody>'; 
                                $no_lcc = 1;
                                foreach($record_lcc as $row_lcc){
                    echo '  
                    <tr>
                        <td>'.$no_lcc++.'</td>
                        <td>'.$row_lcc->nama.'</td>
                        <td>'.$row_lcc->stok.'</td>
                    </tr>
                    ';
                    }
                    echo '
                    </tbody>
                    <tfoot>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok Tersisa</th>
                    </tfoot>
                </table>
            </div>';
        }
        else if($select=="T2")
        {
        echo '
            <div class="table-responsive">
                <table width="100%" id="dt_custom1" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="17%">Nama Barang</th>
                            <th width="25%">Stok Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $no_cmc = 1;
                        foreach($record_cmc as $row_cmc){
                        echo '
                        <tr>
                            <td>'.$no_cmc++.'</td>
                            <td>'.$row_cmc->nama.'</td>
                            <td>'.$row_cmc->stok.'</td>
                        </tr>
                        ';
                        }
                        echo '
                    </tbody>
                    <tfoot>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok Tersisa</th>
                    </tfoot>
                </table>
            </div>';
        }
        else if($select=="T3")
        {
        echo '
            <div class="table-responsive">
                <table width="100%" id="dt_custom1" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="17%">Nama Barang</th>
                            <th width="25%">Stok Tersisa</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $no_probolinggo = 1;
                        foreach($record_probolinggo as $row_probolinggo){
                        echo '
                        <tr>
                            <td>'.$no_probolinggo++.'</td>
                            <td>'.$row_probolinggo->nama.'</td>
                            <td>'.$row_probolinggo->stok.'</td>
                        </tr>
                        ';
                        }
                        echo '
                    </tbody>
                    <tfoot>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok Tersisa</th>
                    </tfoot>
                </table>
            </div>';
        }
    }
}
