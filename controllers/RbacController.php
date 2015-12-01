<?php

namespace app\controllers;

class RbacController extends \yii\web\Controller
{
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        //die(var_dump($auth->getRoles()));

        /*$index = $auth->createPermission('userIndex');
        $index->description = 'Index of the User Controller';
        $auth->add($index);

        $create = $auth->createPermission('userCreate');
        $create->description = 'Index of the User Controller';
        $auth->add($create);*/

        /*$update = $auth->createPermission('activityUpdate');
        $update->description = 'Update a activity';
        $auth->add($update);

        $delete = $auth->createPermission('activityDelete');
        $delete->description = 'Delete a activity';
        $auth->add($delete);

        $edit = $auth->createPermission('activityEdit');
        $edit->description = 'Do create, update and delete activities';
        $auth->add($edit);*/

        $update = $auth->getPermission('activityUpdate');
        $delete = $auth->getPermission('activityDelete');
        $edit = $auth->getPermission('activityEdit');
        $create = $auth->getPermission('activityCreate');

        /*$view = $auth->createPermission('activityView');
        $view->description = 'Index of the User Controller';
        $auth->add($view);*/

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        /*$speaker = $auth->createRole('Speaker');
        $auth->add($speaker);
        $student = $auth->createRole('Student');
        $auth->add($student);
        $vip = $auth->createRole('VIP');
        $auth->add($vip);
        $regular = $auth->createRole('Regular');
        $auth->add($regular);
        $sponsor = $auth->createRole('Sponsor');
        $auth->add($sponsor);*/


        $admin = $auth->getRole('Admin');
        $auth->addChild($admin, $edit);
        $auth->addChild($edit, $create);
        $auth->addChild($edit, $update);
        $auth->addChild($edit, $delete);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($admin, 2);
    }

}
