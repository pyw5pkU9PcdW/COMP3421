<?php

namespace app\controllers;

class RbacController extends \yii\web\Controller
{
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        //die(var_dump($auth->getRoles()));

        $index = $auth->getPermission('postIndex');
        //$index->description = 'Index of the Forum';
        //$auth->add($index);

        $create = $auth->getPermission('postCreate');
        //$create->description = 'Create a Post';
        //$auth->add($create);

        $update = $auth->getPermission('postUpdate');
        //$update->description = 'Update a Post';
        //$auth->add($update);

        $delete = $auth->getPermission('postDelete');
        //$delete->description = 'Remove a Post';
        //$auth->add($delete);

        $edit = $auth->getPermission('postEdit');
        //$edit->description = 'Update and Delete a Post';
        //$auth->add($edit);

        $view = $auth->getPermission('announcementView');
        //$view->description = 'View a Post';
        //$auth->add($view);

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
        //$auth->addChild($user, $edit);
        //$auth->addChild($user, $create);
        //$auth->addChild($edit, $update);
        //$auth->addChild($edit, $delete);
        //$auth->addChild($user, $index);
        $auth->addChild($user, $view);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($admin, 2);
    }

}
