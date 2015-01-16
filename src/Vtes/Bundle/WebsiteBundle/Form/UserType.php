<?php

namespace Vtes\Bundle\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'email')
            ->add('vekn', 'number', array(
                'required' => false,
                'empty_data' => null
            ))
            ->add('password', 'password')
            ->add('name')
            ->add('surname')
            ->add('country', 'country')
            ->add('shirt', 'choice', array(
                'choices' => array('S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL', 'XXL' => 'XXL'),
                'placeholder' => 'user.form-shirt-placeholder'
            ))
            ->add('roommate', 'text', array(
                'attr' => array(
                    'placeholder' => 'user.form-roommate-placeholder'),
                'required' => false,
                'empty_data' => null
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vtes\Bundle\WebsiteBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vtes_bundle_websitebundle_user';
    }

    /**
     * Placeholder for message extraction
     */
    private function translations() {
        $this->get('translator')->trans('user.form-roommate-placeholder');
        $this->get('translator')->trans('user.form-shirt-placeholder');
    }
}
