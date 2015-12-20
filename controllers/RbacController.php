<?php

namespace app\controllers;

class RbacController extends \yii\web\Controller
{
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        //die(var_dump($auth->getRoles()));

        /*$index = $auth->createPermission('couponIndex');
        $index->description = 'Index of the coupon';
        $auth->add($index);

        $create = $auth->createPermission('couponCreate');
        $create->description = 'Create a coupon';
        $auth->add($create);

        $update = $auth->createPermission('couponUpdate');
        $update->description = 'Update a coupon';
        $auth->add($update);

        $delete = $auth->createPermission('couponDelete');
        $delete->description = 'Remove a coupon';
        $auth->add($delete);

        $edit = $auth->createPermission('couponEdit');
        $edit->description = 'Update and Delete a coupon';
        $auth->add($edit);

        $view = $auth->createPermission('couponView');
        $view->description = 'View a coupon';
        $auth->add($view);

        $use = $auth->createPermission('couponGet');
        $use->description = 'Get a coupon';
        $auth->add($use);*/

        $create = $auth->getPermission('qrCodeGenerate');
        //$quit = $auth->getPermission('participantHasActivityDelete');

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
        $auth->addChild($user, $create);
        //$auth->addChild($edit, $update);
        //$auth->addChild($edit, $delete);
        //$auth->addChild($user, $index);
        //$auth->addChild($user, $view);
        //$auth->addChild($user, $quit);

        /*$user = $auth->getRole('Participant');
        $auth->addChild($user, $index);
        $auth->addChild($user, $view);
        $auth->addChild($user, $use);*/

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($admin, 2);
    }

}
