<?php

namespace fctBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class EmpresaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class, array('label'=>'Nombre de la Empresa',
                                                  'label_attr'=>array('class'=>'etiqueta'),
                                                  'attr'=>array('class'=>'etiqueta_nombre')))
            ->add('direccion',TextType::class, array('label'=>'Direccion de la Empresa',
                                                  'label_attr'=>array('class'=>'etiqueta'),
                                                  'attr'=>array('class'=>'etiqueta_direccion')))
            ->add('cp',IntegerType::class, array('label'=>'Código Postal de la Empresa',
                                                  'label_attr'=>array('class'=>'etiqueta'),
                                                  'attr'=>array('class'=>'etiqueta_cp')))
            ->add('telefono1',IntegerType::class, array('label'=>'Teléfono 1 de la Empresa',
                                                  'label_attr'=>array('class'=>'etiqueta'),
                                                  'attr'=>array('class'=>'etiqueta_telefono1')))
            ->add('telefono2',IntegerType::class, array('label'=>'Teléfono 2 de la Empresa',
                                                  'label_attr'=>array('class'=>'etiqueta'),
                                                  'attr'=>array('class'=>'etiqueta_telefono1')))
            ->add('fecha',DateType::class)
            ->add('guardar',SubmitType::class)
            ->add('borrar',ResetType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'fctBundle\Entity\Empresa'
        ));
    }
}
