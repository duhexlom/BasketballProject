<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\User;

/**
 * This console controller is for operations with user
 */
class UserController extends Controller
{

    /**
     * This command generates new user with given params
     * @param string $username
     * @param string $email
     * @param string $password
     * @return int Exit code
     */
    public function actionGenerate($username, $email, $password)
    {
        $user = new User();
        $user->username = $username; 
        $user->email = $email;
        

        $user->generateAuthKey();
        $user->setPassword($password);

        if ($user->save()) {
            echo "User '{$username}' has been created! Their password: {$password}" . PHP_EOL;

            return ExitCode::OK;
        } else {
            var_dump($user->getErrors());

            echo PHP_EOL;

            return ExitCode::DATAERR;
        }
    }

    /**
     * This command changes user's password by given username
     * 
     * @param string $username Username
     * @param string $password New password
     * @return int Exit code
     */
    public function actionChangePassword($username, $password)
    {
        $user = User::findByUsername($username);

        if ($user) {
            $user->setPassword($password);

            if ($user->save()) {
                echo "{$username}'s password has been changed! New password is {$password}" . PHP_EOL;

                return ExitCode::OK;
            } else {
                var_dump($user->getErrors());

                echo PHP_EOL;

                return ExitCode::DATAERR;
            }
        } else {
            echo "{$username} was not found" . PHP_EOL;
            
            return ExitCode::DATAERR;
        }
    }

}
