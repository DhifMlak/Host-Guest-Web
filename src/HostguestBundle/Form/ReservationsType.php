<?php

namespace HostguestBundle\Form;

use Symfony\Component\Form\Extension\Core\DataTransformer\DateIntervalToStringTransformer;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\CallbackTransformer;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationsType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Telephone')
            ->add('etat',NumberType::class, array(
                'label' => 'etat'))
            ->add('nbreservation',NumberType::class, array(
                'label' => 'Nombre de Place'))
            ->add('Type')
            ->add('dateDeb',DateType::class, array(
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-dd-MM',
                'html5' => false,
                'label' => 'Date de Debut',
                'attr' => ['class' => 'js-datepicker'],
    ))
            ->add('dateFin' ,DateType::class, array(
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-dd-MM',
                'html5' => true,

                'attr' => ['class' => 'js-datepicker'],
            ))
          //  ->add('idPack',')//, LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\HiddenType'))
            //->add('idOffre')
            //->add('idVoyageur');//, LegacyFormHelper::sgetType('Symfony\Component\Form\Extension\Core\Type\HiddenType'));
    ;


    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HostguestBundle\Entity\Reservations'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'HostguestBundle_reservations';
    }


}
