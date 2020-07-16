<?php
    if ($_POST['submit'] == "检索") {
        // 查询的表名
        $tableName = $_POST['infoState'];
        // 审核状态 检查状态
        $checkState = $_POST['checkState'];
        // 搜索的类型
        $searchType = $_POST['searchType'];

        $dbms = 'mysql';
        $host = 'localhost';
        $dbName='tb_cityinfo';
        $user='root';
        $pass='123456';

        $dsn="$dbms:dbname=$dbName;host=$host";

        try {
            $pdo = new PDO($dsn, $user, $pass);

            if ($checkState != "%") {
                $sql = "select * from $tableName where type='$searchType' and checkstate = '$checkState' ";
            } else {
                $sql = "select * from $tableName where type='$searchType' ";
            }

            $result = $pdo->prepare($sql);
            $result->execute();

            $res=$result->fetchAll(PDO::FETCH_ASSOC); ?>
            <table class="table table-striped">
                <thead align="center">
                        <tr >
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                        </tr>
                </thead>
                <tbody align="center">
                        <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                        </tr>
                        <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                        </tr>
                        <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                        </tr>
                </tbody>
            </table>
            <?php
            echo count($res);
            exit;
        } catch (Exception $e) {
            die("Error:".$e->getMessage()."<br>");
        }
    }
?>
