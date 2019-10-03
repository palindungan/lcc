<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kasir/M_home');
    }
    public function index()
    {
        $data['record'] = $this->M_home->barang_kasir()->result();
        $this->template->load('view_1/template/kasir', 'view_1/konten/kasir/home/tampil',$data);
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
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = Date('Y-m-d h:i:s');
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
        foreach ($cart as $item) {
            $data_detail = array(
            'id_penjualan' => $id_penjualan,
            'id_stok_b' => $item['id'],
            'harga_jual' => $this->input->post('harga_jual'),
            'qty' => $item['qty'],
            'total_hrg' => $this->input->post('harga_jual') * $item['qty']
            );
        $this->M_home->input_data($data_detail, 'detail_penjualan');
        }
        }
        $this->cart->destroy();
        redirect('kasir/home');
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
    		foreach($this->cart->contents() as $item)
    		{
    		$count++;
    		$output .= '
    		<tr>
    			<td>'. $item['name'] .'</td>
<td class="text-right"><input type="text" id="harga_jual" name="harga_jual" class="form-control text-right harga_jual">
</td>
<td class="text-center">'. $item['qty'] .'</td>
<td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory"
		id="'. $item['rowid'] .'"><i class="btn btn-xs btn-danger glyphicon glyphicon-remove"></i></button></td>
</tr>
</tbody>
';
}
$output .= '
</table>

</div>
';

if($count == 0)
{
$output = '<h6 style="margin-top:20px;" class="text-center"> Keranjang Masih Kosong</h6>';
}
return $output;
}
}
