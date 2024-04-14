<?php
    $cookie_name1="num";
    $cookie_value1="";
    $cookie_name2="op";
    $cookie_value2="";

    if(isset($_POST['num']))
    {
     $num=$_POST['input'].$_POST['num'] ;
    }
    else{
        $num="";
    }
    if(isset($_POST['op']))
    {
        $cookie_value1=$_POST['input'];
        setcookie($cookie_name1, $cookie_value1, time()+(86400*30), "/");

        $cookie_value2=$_POST['op'];
        setcookie($cookie_name2, $cookie_value2, time()+(86400*30), "/");
        $num="";
    }
    if(isset($_POST['equal']))
    {
        $num=$_POST['input'];
        switch($_COOKIE['op'])
        {
            case "+":
                $result=$_COOKIE['num']+$num;
                break;
                case "-":
                    $result=$_COOKIE['num']-$num;
                    break;
                    case "*":
                        $result=$_COOKIE['num']*$num;
                        break;
                        case "/":
                            $result=$_COOKIE['num']/$num;
                            break;
        }
        $num=$result;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calculator.css">
    <title>Calculator</title>
    <style>

    </style>
</head>
<body>
<nav>
    <ul class="nav">
            <li><a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-fw fa-search"></i> Search</a></li>
            <li><a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a></li>
            <li><a href="gallery.php"><i class="fa fa-fw fa-envelope"></i> Gallery</a></li>
            <li><a href="#"><i class="fa fa-fw fa-user"></i> Login</a></li>
            <li><a href="calculator.php"><i class="fa fa-fw fa-user"></i> Kalkulačka</a></li>

        </ul>

    </nav>
        <div class="calc">
            <form action="" method="post">
                <br>
                <input type="text" class="maininput" name="input" value="<?php echo @$num ?>"> <br> <br>
                <input type="submit" class="numbtn" name="num"value="7">
                <input type="submit" class="numbtn" name="num"value="8">
                <input type="submit" class="numbtn" name="num"value="9">
                <input type="submit" class="calbtn" name="op"value="+"> <br><br>
                <input type="submit" class="numbtn" name="num"value="4">
                <input type="submit" class="numbtn" name="num"value="5">
                <input type="submit" class="numbtn" name="num"value="6">
                <input type="submit" class="calbtn" name="op"value="-"><br><br>
                <input type="submit" class="numbtn" name="num"value="1">
                <input type="submit" class="numbtn" name="num"value="2">
                <input type="submit" class="numbtn" name="num"value="3">
                <input type="submit" class="calbtn" name="op"value="*"><br><br>
                <input type="submit" class="c" name="num"value="c">
                <input type="submit" class="numbtn" name="num"value="0">
                <input type="submit" class="equal" name="equal"value="=">
                <input type="submit" class="calbtn" name="op"value="/">


            </form>
        </div>



</body>
</html>