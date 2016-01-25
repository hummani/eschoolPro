<?php
namespace EschoolBundle\Form;

use EschoolBundle\Entity\Evaluation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\Type\SubmitTypeTest;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SubjectType extends EvaluationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        parent::buildForm($builder, $options);
        $builder
            ->add('coef')
            ->add('submit', 'submit')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EschoolBundle\Entity\Subject'
        ));
    }

    public function getName()
    {
        return 'sub_form';
    }
}

