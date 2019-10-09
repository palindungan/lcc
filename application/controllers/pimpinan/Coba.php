<?php

/**
 * 
 */
class Coba extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        echo "<select class='formfield_select'   name='return_pickuptime_hh' id='rhh' >
                  <option value='' selected='selected' >Hour</option>
                  ";


        for ($i = 0; $i <= 24; $i++) {

            echo "<option value=$i>$i</option>";
        }

        echo "</select>";
    }
}
