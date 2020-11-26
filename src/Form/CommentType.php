<?php

namespace App\Form;

use App\Entity\Comment;
use App\Entity\User;
use App\Entity\Article;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content')
            ->add('author',EntityType::class, array(
                'class'   => 'App\Entity\User',
                'choice_label'    => 'id', //attribut we want get for User class
                'multiple' => false,
                'label'=> 'author'
            ))
            ->add('article',EntityType::class, array(
                'class'   => 'App\Entity\Article',
                'choice_label'    => 'id', //attribut we want get for User class
                'multiple' => false,
                'label'=> 'article'
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
