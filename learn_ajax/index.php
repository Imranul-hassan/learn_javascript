<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-light mt-5 p-4 rounded">
               <h5 class ="text-info">Dropdown List Using PHP and Ajax</h5> 
               <form action="" method="POST">
                <div class="form-group">
                <select name="division" class="form-control form-control-lg" id="division">
                    <option value="" disabled selected> Select Division </option>
                    <?php
                    require_once 'connection.php';
                    $sql ="SELECT * FROM division ORDER BY id";
                    $result = mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($result)){
                    ?>
                    <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                    <?php } ?>
                </select>
                </div>
                <div class="form-group">
                    <select name="district" class = "form-control form-control-lg" id="distric">
                        
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name ="submit" value="SUBMIT" class="btn btn-danger btn-block btn-lg">
                </div>

               </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $('#division').change(function(){
        var div = $('#division').val();
        //console.log(div);
        $.ajax({
            url: 'getdist.php',
            dataType: "json",
            data: {
                'div': div
            },
            success: function(res){
                //console.log(res);
                $("#district").html("<option value=''> --Choose District--</option>")
                $.each(res,function(i, item){                                     
                    $("#district").append("<option value='" + item.id + "'>"+item.name+"</option>");
                });
            },
            error: function(xhr, status, error) {
                console.error("An error occurred:", error);
            }
        });
    });
});

</script>
</html>

