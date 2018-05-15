<!DOCTYPE html>
<html>
<?php

require_once 'Movie.php';
require_once 'requires.php';
?>
<head>
    <title>Search page</title>
</head>

<body>
    <?php
                if (isset($_POST['yearStart'])&&isset($_POST['yearEnd'])&&isset($_POST['genre'])) 
                {
                    $yearStart = $_POST['yearStart'];
                    $yearEnd = $_POST['yearEnd'];
                    $genre = $_POST['genre'];
                    if (mysqli_connect_errno())
                    {
                        echo "failed to connect to the mysql server:".mysqli_connect_error();
                    }
                       
                    $sql="SELECT * FROM movies WHERE genre LIKE '%$genre%' and yearofthemovie between $yearStart and $yearEnd";
                    
                    $result=mysqli_query($conn, $sql);
                    if ($result)
                    {
                        echo '<table border="1"><tr><th>Name</th><th>Genre</th><th>Year</th><th>Rate</th></tr>';
                        while ($row = mysqli_fetch_array($result))
                        {               
                                                 
                            $movie=new movie ($row,$conn);
                            echo "<tr><td>".$movie->getName()."</td>";
                            echo "<td>".$movie->getGenre()."</td>";
                            echo "<td>".$movie->getYear()."</td>";
                            echo "<td>".$movie->getAverageRate()."</td></tr>";
                        }
                        echo "</table>";
                    }
                    else 
                        echo "Error cant find the movie".mysqli_error($conn)."<br/>";

                    mysqli_close($conn);
                }
                
            ?>
        <form action="searchMovie.php" method="post" id="theform">
            Year:
            <select name="yearStart">
                <?php yearLoop(); ?>
            </select>
            To:
            <select name="yearEnd">
            <?php backWardYears(); ?>
            </select>
            <br/> Genre:
            <select name="genre">
                <option value="action">Action</option>
                <option value="drama">Drama</option>
                <option value="crime">Crime</option>
                <option value="fantasy">Fantasy</option>
                <option value="comedy">Comedy</option>
                <option value="">All</option>
            </select>
            <br/>
            <input type="submit" value="Search">
            <input type="button" value="Home" onclick="submitHomePage()"></br>
        </form>
</body>

</html>