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
            ->add('body', null, array('required' => false))
            ->add('link', null, array('required' => false))
//            ->add('created')
//            ->add('updated')
            ->add('author')
            ->add('images', null, array('required' => false))
            ->add('techBadges', null, array('required' => false))
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
