<?php

namespace App\Form;

use App\Entity\AchatProduits;
use App\Entity\Personne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class AchatProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, array('label' => 'Nom : '))
            ->add('prix', NumberType::class, array('label' => 'Prix : '))
            ->add('nombre', NumberType::class, array('label' => 'Quantité : '))
            ->add('personne', EntityType::class, array('class' => Personne::class, 'label' => 'id : '));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AchatProduits::class,
        ]);
    }
}
