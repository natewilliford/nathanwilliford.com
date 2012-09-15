<?php

namespace Nate\PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PortfolioEntryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('body')
            ->add('link')
//            ->add('created')
//            ->add('updated')
            ->add('author')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nate\PortfolioBundle\Entity\PortfolioEntry'
        ));
    }

    public function getName()
    {
        return 'nate_portfoliobundle_portfolioentrytype';
    }
}
