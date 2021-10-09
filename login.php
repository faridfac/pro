<?php
require 'mainconfig.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title><?php echo $config['web']['title'] ?></title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <label>LOGIN</label>
              <hr>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password">
                </div>
                
                <button class="btn btn-login btn-block btn-success">LOGIN</button>
              
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
            Don't have an account? <a href="<?php echo $config['web']['base_url'] ?>"> Register</a>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
          
            $(document).ready(function(){
                $('.btn-login').click(function(){
                    var field={
                        email : $('#email').val(),
                        password : $('#password').val(),
                    }
                    $.ajax({
                        url:"<?php echo $config['web']['base_url'] ?>api/login",
                        type:"POST",
                        data: JSON.stringify(field),
                        dataType: "json",
                        success:function(result){
                            var datas = JSON.stringify(result);
                            var obj = JSON.parse(datas);
                            
                            if(obj.status===201){
                              Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: obj.message
                              });
                            }else{
                              Swal.fire({
                                icon: 'error',
                                title: 'Failed!',
                                text: obj.message
                              });
                            }
                        }
                    })
                })
            })
    </script>

  </body>
</html>