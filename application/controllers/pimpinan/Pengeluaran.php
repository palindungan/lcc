<?php 
/**
  * 
  */
class Pengeluaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pimpinan/M_pengeluaran');
    }
    function index(){
        $data['data_toko'] = $this->M_pengeluaran->tampil_toko();
        $this->template->load('view_1/template/pimpinan', 'view_1/konten/pimpinan/pengeluaran/tampil',$data);
    }
    function tampil()
    {
        $select_toko = $this->input->post('toko');
        $select_tanggal = $this->input->post('tanggal');
        $pengeluaran_lcc_minggu = $this->M_pengeluaran->pengeluaran_lcc_minggu();
        if($select_toko=="semua" && $select_tanggal=="hari")
        {
            echo '<div class="widget-tabs-int">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Data Pengeluaran Pemasokan</a></li>
                    <li><a data-toggle="tab" href="#menu1">Data Pengeluaran Lain-lain</a></li>
                </ul>
                <div class="tab-content tab-custom-st">
                    <div id="home" class="tab-pane fade in active">
                        <div class="tab-ctn">
                            <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="dt_custom1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%" style="text-align: center;">No</th>
                                                <th width="15%">Nama User</th>
                                                <th width="15%">Nama Distributor</th>
                                                <th width="20%" style="text-align: center;">Tanggal</th>
                                                <th width="15%" style="text-align: center;">Waktu</th>
                                                <th width="15%" style="text-align: center;">Total</th>
                                                <th width="15%" style="text-align: center;">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center">1</td>
                                                <td>asd</td>
                                                <td>asd</td>
                                                <td style="text-align:center">asd</td>
                                                <td style="text-align:center">asd</td>
                                                <td style="text-align:right">asd</td>
                                                <td style="text-align:center">asd</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th width="5%" style="text-align: center;">No</th>
                                                <th width="15%">Nama User</th>
                                                <th width="15%">Nama Distributor</th>
                                                <th width="20%" style="text-align: center;">Tanggal</th>
                                                <th width="15%" style="text-align: center;">Waktu</th>
                                                <th width="15%" style="text-align: center;">Total</th>
                                                <th width="15%" style="text-align: center;">Detail</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>';
                    echo '
                    <div id="menu1" class="tab-pane fade">
                        <div class="tab-ctn">
                            <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="dt_custom2" width="100%" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;" width="5%">No</th>
                                                <th width="35%">Deskripsi Pengeluaran</th>
                                                <th style="text-align:center;" width="20%">Tanggal</th>
                                                <th style="text-align:center;" width="20%">Waktu</th>
                                                <th style="text-align:center;" width="20%">Jumlah Pengeluaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;">xxxx</td>
                                                <td>asdsad</td>
                                                <td style="text-align: center;">asdasdasd</td>
                                                <td style="text-align: center;">asdasd</td>
                                                <td style="text-align: right;">asdasd</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <th style="text-align:center;" width="5%">No</th>
                                            <th width="35%">Deskripsi Pengeluaran</th>
                                            <th style="text-align:center;" width="20%">Tanggal</th>
                                            <th style="text-align:center;" width="20%">Waktu</th>
                                            <th style="text-align:center;" width="20%">Jumlah Pengeluaran</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        else if($select_toko=="T1" && $select_tanggal=="minggu")
        {
            echo '<div class="widget-tabs-int">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Data Pengeluaran Pemasokan</a></li>
                    <li><a data-toggle="tab" href="#menu1">Data Pengeluaran Lain-lain</a></li>
                </ul>
                <div class="tab-content tab-custom-st">
                    <div id="home" class="tab-pane fade in active">
                        <div class="tab-ctn">
                            <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="dt_custom1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%" style="text-align: center;">No</th>
                                                <th width="15%">Nama User</th>
                                                <th width="15%">Nama Distributor</th>
                                                <th width="20%" style="text-align: center;">Tanggal</th>
                                                <th width="15%" style="text-align: center;">Waktu</th>
                                                <th width="15%" style="text-align: center;">Total</th>
                                                <th width="15%" style="text-align: center;">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align:center">1</td>
                                                <td>asd</td>
                                                <td>asd</td>
                                                <td style="text-align:center">asd</td>
                                                <td style="text-align:center">asd</td>
                                                <td style="text-align:right">asd</td>
                                                <td style="text-align:center">asd</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th width="5%" style="text-align: center;">No</th>
                                                <th width="15%">Nama User</th>
                                                <th width="15%">Nama Distributor</th>
                                                <th width="20%" style="text-align: center;">Tanggal</th>
                                                <th width="15%" style="text-align: center;">Waktu</th>
                                                <th width="15%" style="text-align: center;">Total</th>
                                                <th width="15%" style="text-align: center;">Detail</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>';
                    echo '
                    <div id="menu1" class="tab-pane fade">
                        <div class="tab-ctn">
                            <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="dt_custom2" width="100%" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;" width="5%">No</th>
                                                <th width="15">Nama User</th>
                                                <th width="25%">Deskripsi Pengeluaran</th>
                                                <th style="text-align:center;" width="20%">Tanggal</th>
                                                <th style="text-align:center;" width="20%">Waktu</th>
                                                <th style="text-align:center;" width="15%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        $no_keluar_lcc_minggu = 1;
                                        foreach($pengeluaran_lcc_minggu as $keluar_lcc_minggu)
                                        {
                                            echo '
                                            <tr>
                                                <td style="text-align: center;">'.$no_keluar_lcc_minggu++.'</td>
                                                <td>'.$keluar_lcc_minggu->nama_user.'</td>
                                                <td>'.$keluar_lcc_minggu->deskripsi.'</td>
                                                <td style="text-align: center;">'.date('d F Y',
                                                	strtotime($keluar_lcc_minggu->tanggal)).'</td>
                                                <td style="text-align: center;">'.date('H:i:s',
                                                	strtotime($keluar_lcc_minggu->tanggal)).'</td>
                                                <td style="text-align: right;">'.rupiah($keluar_lcc_minggu->total).'</td>
                                            </tr>
                                            ';
                                        }
                                        echo '
                                        </tbody>
                                        <tfoot>
                                            <th style="text-align:center;" width="5%">No</th>
                                            <th width="15">Nama User</th>
                                            <th width="25%">Deskripsi Pengeluaran</th>
                                            <th style="text-align:center;" width="20%">Tanggal</th>
                                            <th style="text-align:center;" width="20%">Waktu</th>
                                            <th style="text-align:center;" width="15%">Total</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
    }
} 
