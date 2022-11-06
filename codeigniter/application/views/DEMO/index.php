<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <form action="<?php echo base_url('Submit')?>" method="POST" autocomplete="off">
                <div class="form-group">

                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" name="email">
                </div>
                
                <div class="form-group">
                <label for="pwd">Họ Tên</label>
                <input type="text" class="form-control" name="name" placeholder="Enter password" name="pwd">
                </div>
                <div class="form-group">
                <label for="pwd">Tuổi</label>
                <input type="password" class="form-control" id="" placeholder="Enter password" name="tuoi">
                </div>

                <div class="form-group">
                    <label for="pwd">Nghề Nghiệp</label>
                   
                </div>
                
                <button type="submit" class="btn btn-default">Submit</button>

    </form>

   
      <a href="<?php echo base_url('kich_hoat/123s5')?>">Click Link</a>
    
</div>

</body>
</html>

