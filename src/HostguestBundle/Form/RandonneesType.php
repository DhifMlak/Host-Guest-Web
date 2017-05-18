<?php
/**
 * Created by PhpStorm.
 * User: Firas
 * Date: 06/04/2017
 * Time: 12:31
 */

namespace HostguestBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;



class RandonneesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('lieu')
            ->add('nbmax')
            ->add('description')
            ->add('lieuRencontre')
            ->add('heureRencontre')
            ->add('prix')
            ->setMethod('POST')

            ->add('Valider',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'hostguestbundle_randonnees_type';
    }


}