<?php

namespace App\Form;

use App\Entity\Stations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('name')
            ->add('description')
            ->add('image', FileType::class, [
                'label' => 'Image',
                'required' => false,
                'data_class' => null,

            ])->add('submit', SubmitType::class, [
                'label' => 'Create Station',
            ]);
    }
public function configureOptions(OptionsResolver $resolver) : void
    {
        $resolver->setDefaults([
            'data_class' => Stations::class,
        ]);
    }



}