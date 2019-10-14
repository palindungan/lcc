<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('/');
        } else if ($this->session->userdata('akses') != 'Kasir') {
            echo '<script>
            		window.history.back();
            </script>';
        }
        $this->load->model('kasir/M_home');
    }
    public function index()
    {
        $data['daftar_barang'] = $this->M_home->barang_kasir();
        $this->template->load('view_1/template/kasir', 'view_1/konten/kasir/home/tampil', $data);
    }
    public function add_cart()
    {
        $data = array(
            "id" => $_POST["product_id"],
            "name" => $_POST["product_name"],
            "qty" => $_POST["quantity"],
            "price" => $_POST["product_price"]
        );
        $this->cart->insert($data); //return rowid

        // memanggil function
        echo $this->view();
    }
    function delete_cart()
    {
        $this->load->library("cart");
        $row_id = $_POST["row_id"];
        $data = array(
            'rowid' => $row_id,
            'qty' => 0
        );
        $this->cart->update($data);
        echo $this->view();
    }
    public function store()
    {
        $this->form_validation->set_rules('nama_customer', 'nama customer', 'required');
        $this->form_validation->set_rules('no_hp_customer', 'nomor hp', 'required');
        if ($rows = count($this->cart->contents()) == 0) {
            echo "<script>
            alert('Keranjang Anda Masih Kosong');
            window.location = '" . base_url('kasir') . "';
            </script>";
        } else if ($this->form_validation->run() == FALSE) {
            $data['daftar_barang'] = $this->M_home->barang_kasir();
            $this->template->load('view_1/template/kasir', 'view_1/konten/kasir/home/tampil', $data);
        } else {
            date_default_timezone_set("Asia/Jakarta");
            $tanggal = Date('Y-m-d H:i:s');
            $id_customer = $this->M_home->id_customer();
            $id_penjualan = $this->M_home->id_penjualan();
            $data_customer = array(
                'id_customer' => $id_customer,
                'nama' => $this->input->post('nama_customer'),
                'no_hp' => $this->input->post('no_hp_customer')
            );
            $data_penjualan = array(
                'id_penjualan' => $id_penjualan,
                'id_user' => 'U01',
                'id_customer' => $id_customer,
                'tanggal' => $tanggal,
                'total' => $this->input->post('total'),
                'bayar' => $this->input->post('bayar'),
                'kembalian' => $this->input->post('kembalian')
            );
            $this->M_home->input_data($data_customer, 'customer');
            $this->M_home->input_data($data_penjualan, 'penjualan');
            if ($cart = $this->cart->contents()) {
                $i = 0;
                foreach ($cart as $item) {
                    $data_detail = array(
                        'id_penjualan' => $id_penjualan,
                        'id_stok_b' => $item['id'],
                        'harga_jual' => $this->input->post('harga_jual')[$i],
                        'qty' => $item['qty'],
                        'total_hrg' => (int) $this->input->post('harga_jual')[$i] * (int) $item['qty']
                    );
                    $this->M_home->input_data($data_detail, 'detail_penjualan');

                    $i++;
                }
            }
            $this->cart->destroy();
            echo "<script>
            	alert('Sukses Melakukan Transaksi');
            	window.location = '" . base_url("kasir") . "';
            </script>";
        }
    }
    function load()
    {
        echo $this->view();
    }
    function view()
    {
        $output = '';
        $output .= '
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" width="58%">NAMA</th>
                        <th class="text-center" width="40%">HARGA</th>
                        <th width="1%">QTY</th>
                        <th width="1%">.</th>
                    </tr>
                </thead>
                <tbody>
                ';
        $count = 0;
        foreach ($this->cart->contents() as $item) {

            $output .= '
                <input type="hidden" name="cart[' . $item['id'] . '][id]" value="' . $item['id'] . '" />
                <input type="hidden" name="cart[' . $item['id'] . '][name]" value="' . $item['name'] . '" />
                <input type="hidden" id="jumlah_barang" name="cart[' . $item['id'] . '][qty]" value="' . $item['qty'] . '"/>
                    <tr>
                        <td>' . $item['name'] . '</td>
                        <td class="text-right">
                            <input type="text" data-indexnya="' . $item['rowid'] . '" id="harga_jual' . $count . '" name="harga_jual[]" class="form-control text-right harga_jual rupiah_2" onkeyup="update_total()">
                        </td>
                        <input type="hidden" id="qty' . $count . '" name="qty[]" value="' . $item['qty'] . '" />
                        <td class="text-center">' . $item['qty'] . '</td>
                        <td>
                            <button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="' . $item['rowid'] . '">
                                <i class="btn btn-xs btn-danger glyphicon glyphicon-remove"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>';

            $count++;
        }
        $output .= '
                </table>
                </div>';
        if ($count == 0) {
            $output = '<h6 style="margin-top:20px;" class="text-center"> Keranjang Masih Kosong</h6>';
        }
        return $output;
    }
    public function cari()
    {
        // Ambil data NIS yang dikirim via ajax post
        $keyword = $this->input->post('keyword');
        $daftar_barang = $this->M_home->search($keyword);

        // Kita load file view.php sambil mengirim data siswa hasil query function search di SiswaModel
        $hasil = $this->load->view('view_1/konten/kasir/home/barang_kasir', array('daftar_barang' => $daftar_barang), true);
        // Buat sebuah array
        $callback = array(
            'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
        );

        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function ambil_total()
    {
        if (isset($_POST['qty']) && isset($_POST['harga_jual'])) {

            $sub_total = 0;
            $total = 0;

            for ($i = 0; $i < count($this->input->post('qty')); $i++) {

                $qty = (int) $this->input->post('qty')[$i];
                $harga_jual = (int) $this->input->post('harga_jual')[$i];

                $perhitungan = $qty * $harga_jual;

                $sub_total = $sub_total + $perhitungan;
            }

            $total = $sub_total;

            echo $total;
        }
    }
}
