<?php

namespace app\controllers;

class RbacController extends \yii\web\Controller
{
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        //die(var_dump($auth->getRoles()));

        $index = $auth->createPermission('outsideAttractionIndex');
        $index->description = 'Index of the Outside Attraction';
        $auth->add($index);

        $create = $auth->createPermission('outsideAttractionCreate');
        $create->description = 'Create an Outside Attraction';
        $auth->add($create);

        $update = $auth->createPermission('outsideAttractionUpdate');
        $update->description = 'Update an Outside Attraction';
        $auth->add($update);

        $delete = $auth->createPermission('outsideAttractionDelete');
        $delete->description = 'Remove an Outside Attraction';
        $auth->add($delete);

        $edit = $auth->createPermission('outsideAttractionEdit');
        $edit->description = 'Update and Delete an Outside Attraction';
        $auth->add($edit);

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
        $auth->addChild($edit, $create);
        $auth->addChild($edit, $update);
        $auth->addChild($edit, $delete);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($admin, 2);
    }

}
