<!DOCTYPE html>
<html>
<head>
    <title>Service Selector</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="card-group">
        <div class="card bg-primary">
            <div class="card-body text-center">
                <p>Chooses service</p>
                <div class="w3-show-inline-block">
                    <div class="w3-bar">
                        <button class="w3-btn w3-black service-btn" id="bus">Bus</button>
                        <button class="w3-btn w3-teal service-btn" id="train">Train</button>
                        <button class="w3-btn w3-border service-btn" id="cng">CNG</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-danger">
            <div class="card-body text-center">
                <div class="container">
                    <h2>Service Information</h2>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody id="mytbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $(".service-btn").click(function(){
                $(".service-btn").removeClass("bg-warning");
                $(this).addClass("bg-warning");
                var id = $(this).attr("id");

                $.ajax({
                    url: 'get_service.php',
                    dataType: "json",
                    data: {
                        'id': id
                    },
                    success: function(res){
                        //$("#mytbody").empty();
                        $.each(res, function(i, item){
                            $("#mytbody").append("<tr><td>" + item.name + "</td><td>" + item.price + "</td></tr>");
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