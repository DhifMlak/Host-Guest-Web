<?php
/**
 * Created by PhpStorm.
 * User: Joey Badass
 * Date: 02/04/2017
 * Time: 12:52
 */

namespace HostguestBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('cin')
            ->add('dateNaissance', BirthdayType::class, array(
                'widget' => 'choice',))
            ->add('role', ChoiceType::class, array(
                    'choices' => array(
                        'Host' => 'host',
                        'Guest' => 'guest'
                    )
                )
            );

    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}