<!DOCTYPE HTML>
<html lang="es">
    <head>
      
      <title>Login aDocument 2015</title>
      
      <?php include 'view/modulos/links.php';?>
	  <script src="view/css/jquery.js"></script>
	  <script src="view/css/bootstrapValidator.min.js"></script>
	  <script src="view/css/noty.js"></script>
	  <script src="view/css/ValidarLogin.js"></script>
	  
	  <style>
	  		.login{
	  		border-radius: 20px 20px 20px 20px;
			-moz-border-radius: 20px 20px 20px 20px;
			-webkit-border-radius: 20px 20px 20px 20px;
			border: 1.5px solid #000000;
			
			-webkit-box-shadow: 0 20px 6px -6px #777;
			-moz-box-shadow: 0 20px 6px -6px #777;
			box-shadow: 0 20px 6px -6px #777;
			}
			
			.fondo{
			
			/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#020000+0,7db9e8+100&1+0,0+100 */
			background: -moz-radial-gradient(center, ellipse cover,  rgba(2,0,0,1) 0%, rgba(125,185,232,0) 100%); /* FF3.6-15 */
			background: -webkit-radial-gradient(center, ellipse cover,  rgba(2,0,0,1) 0%,rgba(125,185,232,0) 100%); /* Chrome10-25,Safari5.1-6 */
			background: radial-gradient(ellipse at center,  rgba(2,0,0,1) 0%,rgba(125,185,232,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#020000', endColorstr='#007db9e8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

             }
             
        	
	  </style>
	 </head>
   
     <body class="fondo">
	        <form id="form-login" action="<?php echo $helper->url("usuarios","Loguear"); ?>" method="post"  class="col-lg-12" style=" padding-top:150px;">
                <div class="col-lg-12 col-md-12">
                <div class="col-lg-4 col-md-4">
                </div>
                <div class="col-lg-4 col-md-4">
                <div class="col-lg-1 col-md-1">
                </div>
                <div class="col-lg-10 col-md-10">
                 <div class="well login">
                 
                  <img src="view/images/logoidoc.gif" class="img-responsive" alt="Responsive image"  width="350" height="350">
             
                             <div class="form-group" style="margin-top: 20px";>
                             <label for="usuario" class="control-label">Usuario:</label></br>
                             <div class="input-group margin-bottom-sm">
                             <span class="input-group-addon"><i class="fa fa-address-book fa-fw"></i></span>
							 <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Username">
							 <span class="help-block"></span>
							 </div>
                             </div>
                            
                             <div class="form-group">
                             <label for="clave" class="control-label">Password:</label></br>
                             <div class="input-group margin-bottom-sm">
                             <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
							  <input class="form-control" type="password" id="clave" name="clave" placeholder="Password">
							 <span class="help-block"></span>
							 </div>
                             </div>
                            
						    <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center; margin-top:20px;">
						    <div class="col-xs-12 col-md-2 col-lg-2" style="text-align: center;">
						    </div>
						    <div class="col-xs-12 col-md-8 col-lg-8" style="text-align: center;">
						    <div class="form-group">
				           <button type="submit" class="btn btn-success btn-block" ><i class="fa fa-unlock fa-spin" aria-hidden="true"></i> Login</button>
				          
				            </div>
						    </div>
						    <div class="col-xs-12 col-md-2 col-lg-2" style="text-align: center;">
						    </div>
						    </div></br></br></br></br>
						    
						    
                </div>
                </div>
                <div class="col-lg-1 col-md-1">
                </div>
                
               </div>
                <div class="col-lg-4 col-md-4">
               </div>
               </div>
  			</form>
        
    	   
          
    </body>
</html>