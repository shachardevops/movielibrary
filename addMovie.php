<!DOCTYPE html>
<html>
    <?php
        require_once 'requires.php';
        ?>
    <head>

        <title>add movie</title>
       
    </head>
    <body>
        <?php
        require_once 'requires.php';

            if (isset($_POST['name'])&&isset($_POST['genre'])&&isset($_POST['year'])) 
            {
                $name = $_POST['name'];
                $genre = $_POST['genre'];
                $year = $_POST['year'];
                if (mysqli_connect_errno())
                {
                    echo "failed to connect to the mysql server:".mysqli_connect_error();
                }
              
                $sql="INSERT INTO movies(nameofthemovie, genre, yearofthemovie) VALUES('$name', '$genre', '$year');";
                if (mysqli_query($conn, $sql))
                {
                    echo "the movie added ";
                }
                else 
                {
                    echo "Error creating movie ".mysqli_error($conn)."<br/>";
                }
                mysqli_close($conn);
            }

        ?>
        <form action="addmovie.php" id="theform" method="post">

            Name of the movie:<input type="text" name="name"><br/>
            Genre:
            <select name="genre">
                <option value="action">Action</option>
                <option value="drama">Drama</option>
                <option value="crime">Crime</option>
                <option value="fantasy">Fantasy</option>
                <option value="comedy">Comedy</option>
            </select><br/>    
            Year:
            <select name="year">
                <?php backWardYears(); ?>
            </select>
            <input type="submit">
            <input type="button" value="Home" onclick="submitHomePage()"></br>

    </form>
</body>
</html>

