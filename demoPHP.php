<!DOCTYPE html>

<html>
    <title>
        demo php
    </title>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset="utf-8">
    </head>

    <body>
        <?php
//        PhpInfo();


        //1.
        try{
            $pdo = new PDO("sqlite:test2.db3","","");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch(PDOException $e){
            die("失败".$e->getMessage());
        }

//        echo '����<br>';
//        $pdo->exec("CREATE TABLE demo(id integer,name varchar(255))");
//        echo '<br>';
//        $pdo->exec("INSERT INTO demo values(1,'com')");
//        $pdo->exec("INSERT INTO demo values(2,'com2')");
//        $pdo->exec("INSERT INTO demo values(3,'com3')");
//        $pdo->beginTransaction();
//        $sth = $pdo->prepare('select  * from demo');
//        $sth->execute();
//        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

       // print_r($result);
//        foreach ($result as $row) {
//            echo $row['id'].'-------'.$row['password'].'<br>';
//        }


        //2.
//
        $pdo->exec("insert into logininfo VALUES ('5', '432','')");

        $sql = 'select * from loginInfo;';
        foreach($pdo->query($sql) as $row){
            echo $row['ID'].'----'.$row['PASSWORD'].'<br>';
        }
        ?>


    </body>
</html>



