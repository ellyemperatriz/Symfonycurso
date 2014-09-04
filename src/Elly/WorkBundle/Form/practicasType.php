<?php

namespace Elly\WorkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class practicasType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('actividad')
            ->add('frecuencia')
            ->add('horas')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Elly\WorkBundle\Entity\practicas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elly_workbundle_practicas';
    }
}
