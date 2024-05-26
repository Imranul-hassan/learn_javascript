<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body> 

<div class="container">
  <h2>Cards Columns</h2>
  <div class="card-columns">
    <div class="card bg-light">
      <div class="card-body text-center" >
      

      <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 bg-light mt-5 p-4 rounded">
               <h5 class ="text-info">Input Division and Districts</h5> 
               <form action="" method="POST">
                <div class="form-group">
                <div class="col-md-14 form-group mt-4">
                        <input type="text" class="form-control" placeholder="Enter Division" id="usr" name="division[]"> 
                </div>
                <span class="btn btn-success" id="add-btn" >+</span>
                <div id="my-div">
                  <div class="row" id="row-remove">
                    <div class="col-md-10 form-group mt-4">
                        <input type="text" class="form-control" placeholder="Enter District"  id="usr" name="district[]"> 
                    </div>
                    <div class="col-md-2 mt-4">
                        <button class="btn btn-danger">-</button>
                    </div>
                  </div>
                </div>
                <button type="submit" name = "submit" value = "submit" class="btn btn-primary">Submit</button>
               </form>
               
            <?php
                if (isset($_POST["submit"])) {
                    $divisions = $_POST["division"];
                    $districts = $_POST["district"];

                    require_once 'connection.php';

                    foreach ($divisions as $division) {
                        $division_query = mysqli_query($conn, "INSERT INTO division (name) VALUES ('$division')");

                        if ($division_query) {
                            $div_id = mysqli_insert_id($conn);

                            foreach ($districts as $district) {

                                if (!empty($district)) {
                                    $district_query = mysqli_query($conn, "INSERT INTO district (div_id, name) VALUES ($div_id, '$district')");
                                    if (!$district_query) {
                                        echo "Error: " . mysqli_error($conn);
                                        
                                    }
                                }
                            }
                        } else {
                            
                            echo "Error: " . mysqli_error($conn);
                        }
                    }
                }
            ?>


            </div>
        </div>
      </div>

      
    </div>
  </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#add-btn').click(function(){
            //alert("Add the member");
            $("#my-div").append(`<div class="row">
            <div class="col-md-10 form-group mt-4">
                <input type="text" class="form-control" id="usr" name="district[]"> 
            </div>
            <div class="col-md-2 mt-4">
                <button class="btn btn-danger remove_item_btn d-grid">-</button>
            </div>
        </div>`);
        });
       
    });
    $(document).ready(function(){
        $('.card-columns').on('click', '.btn-danger', function(){
            $(this).closest('.row').remove();
        });
    });
    
</script>
</html>