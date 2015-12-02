<?php

namespace app\controllers;

class RbacController extends \yii\web\Controller
{
    public function actionInit() {
        $auth = \Yii::$app->authManager;
        //die(var_dump($auth->getRoles()));

        //$index = $auth->createPermission('userIndex');
        //$index->description = 'Index of the User Controller';
        //$auth->add($index);

        $create = $auth->createPermission('participantHasActivityCreate');
        $create->description = 'User Join an Activity';
        $auth->add($create);

        //$update = $auth->createPermission('ParticipantHasActivityUpdate');
        //$update->description = 'Update a activity';
        //$auth->add($update);

        $delete = $auth->createPermission('participantHasActivityDelete');
        $delete->description = 'User Quit an Activity';
        $auth->add($delete);

        $edit = $auth->createPermission('participantHasActivityEdit');
        $edit->description = 'Do join and quit activities';
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


        $user = $auth->getRole('Participant');
        $auth->addChild($user, $edit);
        $auth->addChild($edit, $create);
        //$auth->addChild($edit, $update);
        $auth->addChild($edit, $delete);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($admin, 2);
    }

}
