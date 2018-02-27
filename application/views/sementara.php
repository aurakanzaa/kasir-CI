<section id="main-content">
    <section class="wrapper">
      
          
        <h1><i class="fa fa-angle-right"></i> KASIR</h1><hr>
        
            <div class="row mt">
              <div class="col-lg-12">
             
                  <div class="form-panel">
                  <?php echo form_open_multipart('kasir/update/'.$produk[0]->id_detail.'/'.$produk[0]->id_produk); ?>
                    <table class="table table-hover">
                    	<tr>
                    		
                    	     <td>qty</td>
                    		<td></td>
                    	</tr>
                    	
							<td>
                                <div class="col-sm-5">
                                <input type="number" class="form-control" name='qty'>
                                </div>              
                            </td>

                        
                            <td>
                            <button class="btn btn-success">submit</button>
                            </td>
                        </tr>
                       
                    </table>
                 
        
                  </div>
              </div>
            </div>
        
            

    </section>
</section>