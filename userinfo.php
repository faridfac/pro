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
              <label>USER INFO</label>
              <hr>
                <div class="form-group">
                  <label>JWT</label>
                  <input type="text" class="form-control" id="jwt">
                </div>
                <button class="btn btn-uinfo btn-block btn-success">SUBMIT</button>
              
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
            Already have an account? <a href="<?php echo $config['web']['base_url'] ?>login"> Login</a>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
          
            $(document).ready(function(){
                $('.btn-uinfo').click(function(){
                    var jwt = $("#jwt").val();
                    $.ajax({
                        url:"<?php echo $config['web']['base_url'] ?>api/user-info",
                        type:"GET",
                        dataType: "json",
                        beforeSend: function(xhr, settings) { xhr.setRequestHeader('Authorization','Bearer ' + jwt ); },
                        success:function(result){
                            var datas = JSON.stringify(result);
                            var obj = JSON.parse(datas);
                            
                            if(obj.status===200){
                              Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: obj.user
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
