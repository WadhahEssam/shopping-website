<?php
    
    function message() {
    if(isset($_GET['error'])){
        
        $error = $_GET['error'] ;
        
        echo('<div class="row error" style="margin:20px">');
        echo('    <div class="col-lg-12">');
        echo('        <div class="alert alert-danger" >');
        echo('          <strong>Error!</strong> '.$error );
        echo('        </div>');
        echo('    </div>');
        echo('</div>');
        
    }
    
    if(isset($_GET['message'])){
        
        
        $message = $_GET['message'] ;
        
        echo('<div class="row error" style="margin:20px">');
        echo('    <div class="col-lg-12">');
        echo('        <div class="alert alert-info" >');
        echo('          '.$message );
        echo('        </div>');
        echo('    </div>');
        echo('</div>');
    }
}

?>