<?php

namespace Vtes\Bundle\WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'email', array(
                'label' => 'players.email'
            ))
            ->add('vekn', 'number', array(
                'label' => 'players.vekn',
                'required' => false,
                'empty_data' => ''
            ))
            ->add('name', null, array(
                'label' => 'players.name'
            ))
            ->add('surname', null, array(
                'label' => 'players.surname'
            ))
            ->add('country', 'country', array(
                'label' => 'players.country'
            ))
            ->add('shirt', 'choice', array(
                'choices' => array('S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL', 'XXL' => 'XXL'),
                'placeholder' => 'user.form-shirt-placeholder'
            ))
            ->add('days', 'choice', array(
                'label' => 'players.days',
                'choices' => array(1 => '1', 2 => '2', 3 => '3'),
                'placeholder' => 'user.form-days-placeholder'
            ))
            ->add('room', 'choice', array(
                'label' => 'players.room',
                'choices' => array(
                    0 => 'user.form-room-none',
                    1 => 'user.form-room-single',
                    2 => 'user.form-room-double'),
                'attr' => array(
                    'placeholder' => 'user.form-room-placeholder',
                    'onchange' => 'getRoommateOption()')
            ))->add('roommate', 'text', array(
                'label' => 'players.roommate',
                'attr' => array(
                    'placeholder' => 'user.form-roommate-placeholder'
                ),
                'required' => false,
                'empty_data' => null
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
    private function translations()
    {
        $this->get('translator')->trans('user.form-roommate-placeholder');
        $this->get('translator')->trans('user.form-shirt-placeholder');
        $this->get('translator')->trans('user.form-room-placeholder');
        $this->get('translator')->trans('user.form-days-placeholder');
        $this->get('translator')->trans('user.form-room-none');
        $this->get('translator')->trans('user.form-room-single');
        $this->get('translator')->trans('user.form-room-double');
    }
}
