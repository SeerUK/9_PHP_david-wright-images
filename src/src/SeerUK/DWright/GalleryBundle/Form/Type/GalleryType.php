<?php

/*
 * This file is part of the SeerUKDwrightGalleryBundle
 *
 * (c) Elliot Wright <wright.elliot@gmail.com> - 2013
 *
 * For full license information please visit
 * http://license.visualidiot.com/
 */

namespace SeerUK\DWright\GalleryBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Gallery Type
 */
class GalleryType extends AbstractType
{
    /**
     * Builds the form ...
     *
     * @param  FormBuilderInterface $builder
     * @param  array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('label' => 'Title'));
        $builder->add('desc', 'textarea', array('label' => 'Description'));
    }


    /**
     * Sets default options
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SeerUK\DWright\GalleryBundle\Entity\Gallery',
        ));
    }


    /**
     * Gets name ...
     *
     * @return string
     */
    public function getName()
    {
        return 'gallery';
    }
}