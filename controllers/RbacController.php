<?php

namespace app\controllers;

class RbacController extends \yii\web\Controller
{
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        //die(var_dump($auth->getRoles()));

        //$index = $auth->createPermission('userBibiIndex');
        //$index->description = 'Index of the User Bibi';
        //$auth->add($index);

        $create = $auth->createPermission('userBibiCreate');
        $create->description = 'Create a User Bibi';
        $auth->add($create);

        $update = $auth->createPermission('userBibiUpdate');
        $update->description = 'Update a User Bibi';
        $auth->add($update);

        $delete = $auth->createPermission('userBibiDelete');
        $delete->description = 'Remove a User Bibi';
        $auth->add($delete);

        $edit = $auth->createPermission('userBibiEdit');
        $edit->description = 'Update and Delete a User Bibi';
        $auth->add($edit);

        /*$view = $auth->createPermission('categoryView');
        $view->description = 'View a Category';
        $auth->add($view);*/


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


        $user = $auth->getRole('Admin');
        $auth->addChild($user, $edit);
        $auth->addChild($user, $create);
        $auth->addChild($edit, $update);
        $auth->addChild($edit, $delete);
        //$auth->addChild($user, $index);
        //$auth->addChild($user, $view);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($admin, 2);
    }

}
