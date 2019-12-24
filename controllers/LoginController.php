<?php

namespace app\controllers;
use Yii;
use  yii\web\Session;

class LoginController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'mainLogin';

        if (!empty($_POST['UserID']) && !empty($_POST['UserPassword'])) {

            $user = $_POST['UserID'];
            $pass = $_POST['UserPassword'];

            try {
                $host = "10.19.19.50";
                $odbc = 'DRIVER={SQL Server};SERVER='.$host.';DATABASE=Office';
                //T_AllUser
                $sql = "SELECT UserID,UserPassword,UserName,UserBranch FROM T_AllUser WHERE UserID='$user' AND UserPassword='$pass'";
                $con = odbc_connect($odbc, 'sa', 'w,jgvkojk');
                $result = odbc_exec($con, $sql);
                while ($row = odbc_fetch_array($result)) {
                    $UserID = $row['UserID'];
                    $UserName =$row['UserName'];
                    $UserBranch =$row['UserBranch'];
                }  
                
                if(!empty($UserBranch)){
                    //T_Branch
                    $sql_branch = "
                    SELECT 
                        T_Branch.BrnCode,T_Branch.BrnName,
                        T_Cashier.CshName, T_Cashier.CshDatabaseServerAlone
                    FROM 
                        T_Branch 
                    JOIN 
                        T_Cashier
                    ON 
                        T_Branch.BrnCode=T_Cashier.CshBranch
                    WHERE
                        BrnCode='$UserBranch'
                    ORDER BY T_Cashier.CshDatabaseServerAlone                    
                    ";
                    $con = odbc_connect($odbc, 'sa', 'w,jgvkojk');
                    $result = odbc_exec($con, $sql_branch);
                    while ($row = odbc_fetch_array($result)) {
                        $BrnName = $row['BrnName'];
                        $CshDatabaseServerAlone[$row["CshDatabaseServerAlone"]] = $row["CshDatabaseServerAlone"]; 
                    } 

                    $session = Yii::$app->session;
                    $session->set('UserID', $UserID);
                    $session->set('UserBranch', $UserBranch);
                    $session->set('UserName', iconv("TIS-620", "UTF-8", $UserName));
                    $session->set('BrnName', iconv("TIS-620", "UTF-8", $BrnName));
                    $session->set('CshDatabaseServerAlone', $CshDatabaseServerAlone);
                    //Login OK
                    $this->redirect(array('repair/index'));
                }else{
                    \Yii::$app->getSession()->setFlash('errorTxt', 'รหัสพนักงานหรือรหัสผ่านไม่ถูกต้อง');
                    $this->redirect('login');
                }
               
            odbc_free_result($result);

            } catch (PDOException $e) {
                echo "Failed to get DB handle: " . $e->getMessage() . "\n";
                exit;
            }
        
        } else {
            return $this->render('index');
        } 

    }

    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->removeAll();
        return $this->redirect('index');
    }
}
