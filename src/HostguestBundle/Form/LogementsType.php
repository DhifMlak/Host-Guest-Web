<?php

namespace HostguestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class LogementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('adresse')
            ->add('ville')
            ->add('paye')
            ->add('prix')
            ->add('type')
            ->add('internet',CheckboxType::class, array(
                'label'    => 'internet',
                'required' => false,
            ))
            ->add('parking',CheckboxType::class, array(
                'label'    => 'parking',
                'required' => false,
            ))

            ->add('piscine',CheckboxType::class, array(
                'label'    => 'piscine',
                'required' => false,
            ))
            ->add('cableTv',CheckboxType::class, array(
                'label'    => 'cableTv',
                'required' => false,
            ))

            ->setMethod('GET')

            ->add('save',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'HostguestBundle_logements_type';
    }
}
