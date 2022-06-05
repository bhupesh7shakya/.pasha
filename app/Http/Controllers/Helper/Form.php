<?php
namespace App\Http\Controllers\Helper;

class Form{
    public $form;
    public  function inputField($name=""){
        $this->form .='
        <div class="mb-3">
            <label class="form-label">Text</label>
            <input type="text" class="form-control" name="'.$name.'" placeholder="Input placeholder">
      </div>';
    }
}
