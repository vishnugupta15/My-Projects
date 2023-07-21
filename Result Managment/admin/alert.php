<?php include 'link.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    




    <script>
  /////////////////// Alert JavaScript Code  ///////////////////////////////

        function successAlert(msg, delay, feel) {
            $(".alert-modal").append(
                '<div class="alert non-animated '+ feel +'"><i class = "bx bx-badge-check" style="font-size:20px;"></i><span>'+ msg +'</span><i class = "bx bx-message-square-x "></i></div>'
            );
            $(".non-animated").animate({left:"0"})
            $(".non-animated").removeClass(".non-animated").delay(10000).fadeOut(function(){
                $(this).remove();
            });
            if($(".alert-modal .alert").length > 4){
                $(".alert-modal .alert").eq(0).remove();
            }
        }

        function errorAlert(msg, delay, feel) {
            $(".alert-modal").append(
            '<div class="alert non-animated '+ feel +'"><i class = "fa fa-exclamation-circle feel icon-notification"></i><span>'+ msg +'</span><i class = "fa fa-times icon-delete"></i></div>'
            );
            $(".non-animated").animate({left:"0"})
            $(".non-animated").removeClass(".non-animated").delay(10000).fadeOut(function(){
                $(this).remove();
            });
            if($(".alert-modal .alert").length > 4){
                $(".alert-modal .alert").eq(0).remove();
            }
        }

        function deleteAlert(msg, delay, feel) {
            $(".alert-modal").append(
                '<div class="alert non-animated '+ feel +'"><i class = "fa fa-check feel icon-notification"></i><span>'+ msg +'</span><i class = "fa fa-times icon-delete"></i></div>'
            );
            $(".non-animated").animate({left:"0"})
            $(".non-animated").removeClass(".non-animated").delay(10000).fadeOut(function(){
                $(this).remove();
            });
            if($(".alert-modal .alert").length > 4){
                $(".alert-modal .alert").eq(0).remove();
            }
        }

        $(document).on("click",".alert-modal .alert" , function(){
            $(this).stop(false , true);
        });

    </script>
</body>
</html>