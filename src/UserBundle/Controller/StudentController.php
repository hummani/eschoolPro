<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class StudentController extends Controller
{
    public function indexAction()
    {
        $students = $this->get('student_manager');

        return $this->render('UserBundle:Admin:test.html.twig',array('students'=>$students->getAll()));
    }



    public function registerAction()
    {

        $user = $this->get('student_handler');

        if ($user->onProcess()) {
            die('ok');

        }

        return $this->render(
            'UserBundle:Security:register.html.twig',
             array('form' => $user->getForm()->createView())
        );
    }

    public function deleteAction($id){

        $student = $this->get('student_manager');
        $student->remove($id);

    }


}
