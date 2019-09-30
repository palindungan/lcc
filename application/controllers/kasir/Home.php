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
        $this->template->load('view_1/template/kasir', 'view_1/konten/kasir/home/tampil');
    }
    function fetch()
    {
        $output = '';
        $query = '';
            if($this->input->post('query'))
            {
                $query = $this->input->post('query');
            }
                $data = $this->M_home->fetch_data($query);
                $output .= '<div>';
    	        if($data->num_rows() > 0)
    	        {
    	            foreach($data->result() as $row)
    	            {
                        $kode = "";
                        if($row->kode_unik == "kosong")
                        {
                            $kode = $row->barcode;
                        } else {
                            $kode = $row->kode_unik;
                        }
    	            $output .= '
    	            <div style="margin-bottom:5px;" class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
    		            <div class="thumbnail">
    			            <div class="caption">
    				        <input type="hidden" name="id" value="'.$row->id_stok_b.'"/>
                            <input type="hidden" name="name" value="'. $row->nama .'"/>
                            <input type="hidden" name="price" value="0"/>
                            <input type="hidden" name="qty" value="1"/>
                            <p class="text-center"><b>'.$kode.'</b></p>
                            <p style="font-size:15px">'.$row->nama.'</p>
                            <p style="font-size:15px">'.date('d-m-Y', strtotime($row->tanggal)).'</p>
                            <p class="text-center"><button type="submit" class="btn btn-primary " role="button"><i
                                        class="glyphicon glyphicon-shopping-cart"></i>
                                    Beli</button></p>
                            </div>
                        </div>
                    </div>';
                    }           
                } 
                else 
                {
                    $output .= '
                            <div>No Data Found</div>';
                }
                $output .= '</div>';
                echo $output;
    }
    public function add_cart()
    {
        $data_produk = array(
        'id' => $this->input->post('id'),
        'name' => $this->input->post('name'),
        'price' => $this->input->post('price'),
        'qty' => $this->input->post('qty')
        );
        $this->cart->insert($data_produk);
        redirect('kasir/home');
    }
    public function delete_cart($rowid)
    {
        if ($rowid == "all") {
        $this->cart->destroy();
        } 
        else 
        {
            $data = array(
            'rowid' => $rowid,
            'qty' => 0 
            );
            $this->cart->update($data);
        }
        redirect('kasir/home');
    }
}
