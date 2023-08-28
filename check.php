<?php
    $user = 'root';
    $password = 'root';
    $db = 'inventory';
    $host = 'localhost';
    $port = 8889;
    
    $link = mysqli_init();
    $success = mysqli_real_connect(
       $link,
       $host,
       $user,
       $password,
       $db,
       $port
    );
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $company_name = $_POST['company_name'];
    $personal_phone = $_POST['personal_phone'];
    $work_phone = $_POST['work_phone'];
    $corporate_phone = $_POST['corporate_phone'];
    $pass = $_POST['pass'];

    $first_name = filter_var(trim($_POST['first_name']), #Фильтруем, чтобы небыло лишних пробелов
    FILTER_SANITIZE_STRING); #Фильтруем как обычную строку
    $last_name = filter_var(trim($_POST['last_name']), 
    FILTER_SANITIZE_STRING); 
    $last_name = filter_var(trim($_POST['last_name']), 
    FILTER_SANITIZE_STRING); 
    $email = $_POST['email'];
    $email_dog = '@';
    $company_name = filter_var(trim($_POST['company_name']), 
    FILTER_SANITIZE_STRING); 
    
    

    if(mb_strlen($first_name) < 4 || mb_strlen($first_name) > 60 ){
        echo "Недопустимая длина имени";
        exit();
    }
    if(mb_strlen($last_name) < 4 || mb_strlen($last_name) > 60 ){
        echo "Недопустимая длина логина";
        exit();
    }
    if (strpos($email, $email_dog) === false) {
        echo "Неверный адрес эл.почты";
        exit();
    }
    if(mb_strlen($company_name) < 4 || mb_strlen($last_name) > 60 ){
        echo "Недопустимая длина названия компании";
        exit();
    }

#    $qwery = mysqli_qwery($bd, "SELECT FROM `users` WHERE `first_name` = {$first_name}'");
#    if (mysqli_num_rows($qwery) == 0 ) {
#        $_SESSION['user'] = ['nick' => $first_name];    
#        mysqli_qwery($bd, "INSERT INTO `user` (`first_name`, `pass`) VALUES ('{$first_name}', '{$pass}')");
#        header("location: /user.php");
#    }   else {
#        echo("error")
#    }

    $mysql = new mysqli('localhost', 'root', 'root', 'test'); #Подключение к базе данных
    $mysql->query("INSERT INTO `users` (`first_name`, `last_name`, `email`, `company_name`, `personal_phone`, `work_phone`, `corporate_phone`, `pass`)
    VALUES('$first_name', '$last_name', '$email', '$company_name', '$personal_phone', '$work_phone', '$corporate_phone', '$pass')"); #Добавляем непосредсвенно данные из полей в базу данных

    $mysql->close();
?>