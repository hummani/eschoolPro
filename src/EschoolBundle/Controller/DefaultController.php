<?php

namespace EschoolBundle\Controller;

use EschoolBundle\Entity\Subject;
use EschoolBundle\Form\SubjectType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    { /*$em= $this->getDoctrine()->getRepository('EschoolBundle:Subject')->find(2);
      $em1= $this->getDoctrine()->getManager();
        $em1->remove($em);
        $em1->flush();
      $sub = new Subject();
        $sub->setName('toto');
        $sub->setNames('tototo');
        $sub->setCreatedAt(new \DateTime());
        $sub->setCoef(2);
        $sub->setDuration(22);
        $sub->setEvaluationDate(new \DateTime());
        $sub->setModifiedAt(new \DateTime());
        $em= $this->getDoctrine()->getManager();
        $em->persist($sub);
        $em->flush();
        var_dump($em->getCreatedAt());die;*/

        $sub = new Subject();
        $form = $this->createForm(new SubjectType(),$sub);

        $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($sub);
        $em->flush();

      var_dump('ok');die;
      }



        return $this->render('EschoolBundle:Default:index.html.twig', array('form'=>$form->createView()));
    }
}
