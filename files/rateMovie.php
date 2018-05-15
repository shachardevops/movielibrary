<!DOCTYPE html>
<html>
    <head>

        <title>Rate page</title>
    </head>
    <body>
        <?php
            require_once 'requires.php';

            if (isset($_POST['name'])&&isset($_POST['rate'])) 
            {
                $name = $_POST['name'];
                $rate = $_POST['rate'];
                
                if (mysqli_connect_errno())
                {
                    echo "failed to connect to the mysql server: ".mysqli_connect_error();
                }
              
                $sql="INSERT INTO rate(nameofthemovie, rate) VALUES('$name', '$rate');";
                if (mysqli_query($conn, $sql))
                {
                    echo "you rated the movie ";
                }
                else 
                {
                    echo "Error rating the movie ".mysqli_error($conn)."<br/>";
                }
                arrangeTheList($conn);
                mysqli_close($conn);
            }
        ?>
        <form action="rateMovie.php" method="post" id="theform">
            Name of the movie:
            <input type="text" name="name"></br>
            Rate:
            <select name="rate">
                <?php rateLoop(); ?>
            </select> <br/>         
            <input type="submit" value="Rate">
            <input type="button" value="Home" onclick="submitHomePage()"></br>
        </form>
    </body>
</html>