<?php

namespace app\controllers;

class RbacController extends \yii\web\Controller
{
    public function actionInit() {
        $auth = \Yii::$app->authManager;

        /*$index = $auth->createPermission('userIndex');
        $index->description = 'Index of the User Controller';
        $auth->add($index);

        $create = $auth->createPermission('userCreate');
        $create->description = 'Index of the User Controller';
        $auth->add($create);

        $update = $auth->createPermission('userUpdate');
        $update->description = 'Index of the User Controller';
        $auth->add($update);

        $delete = $auth->createPermission('userDelete');
        $delete->description = 'Index of the User Controller';
        $auth->add($delete);

        $view = $auth->createPermission('userView');
        $view->description = 'Index of the User Controller';
        $auth->add($view);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $speaker = $auth->createRole('Speaker');
        $auth->add($speaker);
        $student = $auth->createRole('Student');
        $auth->add($student);
        $vip = $auth->createRole('VIP');
        $auth->add($vip);
        $regular = $auth->createRole('Regular');
        $auth->add($regular);
        $sponsor = $auth->createRole('Sponsor');
        $auth->add($sponsor);


        $admin = $auth->getRole('Admin');
        $auth->addChild($admin, $index);
        $auth->addChild($admin, $create);
        $auth->addChild($admin, $update);
        $auth->addChild($admin, $delete);
        $auth->addChild($admin, $view);*/

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($admin, 2);
    }

}
