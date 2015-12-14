<?php

namespace app\controllers;

class RbacController extends \yii\web\Controller
{
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        //die(var_dump($auth->getRoles()));

        /*$index = $auth->createPermission('surveyIndex');
        $index->description = 'Index of the Survey';
        $auth->add($index);

        $create = $auth->createPermission('surveyCreate');
        $create->description = 'Create a Survey';
        $auth->add($create);

        $update = $auth->createPermission('surveyUpdate');
        $update->description = 'Update a Survey';
        $auth->add($update);

        $delete = $auth->createPermission('surveyDelete');
        $delete->description = 'Remove a Survey';
        $auth->add($delete);

        $edit = $auth->createPermission('surveyEdit');
        $edit->description = 'Update and Delete a Survey';
        $auth->add($edit);*/

        $index = $auth->getPermission('surveyDo');

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


        /*$user = $auth->getRole('Admin');
        $auth->addChild($user, $edit);
        $auth->addChild($edit, $create);
        $auth->addChild($edit, $update);
        $auth->addChild($edit, $delete);*/

        $user = $auth->getRole('Admin');
        $auth->addChild($user, $index);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($admin, 2);
    }

}
