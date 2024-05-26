<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    
    <nav class="navbar navbar-expand-sm bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item" id="male" >
                <a class="nav-link" href="#">Male</a>
            </li>
            <li class="nav-item" id="female" >
                <a class="nav-link" href="#">Female</a>
            </li>
        </ul>
    </nav>
    <br>
    <div class="container">
        <h2>Man Information</h2>     
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Occupation</th>
                </tr>   
            </thead>
            <tbody id="mytbody">
            
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script> 
        $(document).ready(function(){
            $(".nav-item").click(function(){
                    $(".nav-item").removeClass("bg-warning");
                    $(this).addClass("bg-warning");
                    var id = $(this).attr("id");
                    //alert(id);

                    $.ajax({
                    url: 'getman.php',
                    dataType: "json",
                    data: {
                        'id': id
                    },
                    
                    success: function(res){
                        //console.log(res);
                        $("#mytbody").empty();
                        $.each(res,function(i, item){  
                            $("#mytbody").append("<tr>");                                   
                            $("#mytbody").append("<td>" + item.name +"</td>");
                            $("#mytbody").append("<td>" + item.Occupation +"</td>");
                            $("#mytbody").append("</tr>");
                        });
                        
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred:", error);
                    } 
                });
                    

            });


        });
    </script>

</body>
</html>