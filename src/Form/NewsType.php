<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\News;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'constraints' => [
                    new NotNull([
                        'message'=>'Title can not be blank'
                    ]),
                ]
            ))
            ->add('content', TextareaType::class, array(
                'constraints' => [
                    new NotNull([
                        'message'=>'Content can not be blank'
                    ]),
                ]
            ))
            ->add('category', EntityType::class, array(
                'class'=> Category::class,
                'constraints' => [
                    new NotNull([
                        'message'=>'Category can not be blank'
                    ]),
                ]
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => News::class,
            'csrf_protection' => false
        ]);
    }
}
