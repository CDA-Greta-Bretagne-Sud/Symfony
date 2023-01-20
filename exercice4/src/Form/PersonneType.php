<?php

namespace App\Form;

use App\Entity\Personne;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, array('label' => 'Nom : '))
            ->add('prenom', TextType::class, array('label' => 'Prénom : '))
            ->add('dateNaiss', DateType::class, array('label' => 'Date de naissance : ', 'widget' => 'single_text'))
            ->add('email', EmailType::class, array('label' => 'Email : '))
            ->add('telephone', TextType::class, array('label' => 'Téléphone : '))
            ->add('login', TextType::class, array('label' => 'Login : '))
            ->add('pwd', TextType::class, array('label' => 'Mot de passe : '))
            ->add('adresse', AdresseType::class, array('label' => 'Adresse : '))
            ->add('achatProduits', CollectionType::class, array('entry_type' => AchatProduitsType::class, 'allow_add' => true, 'allow_delete' => true))
            ->add('livre', CollectionType::class, array('entry_type' => LivreType::class, 'allow_add' => true, 'allow_delete' => true));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
