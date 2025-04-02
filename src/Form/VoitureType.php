<?php

namespace App\Form;

use App\Entity\Voiture;
use App\Enum\CapacityEnum;
use App\Enum\TransmissionTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la voiture',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('mensualPrice', NumberType::class, [
                'label' => 'Prix mensuel',
            ])
            ->add('dailyPrice', NumberType::class, [
                'label' => 'Prix journalier',
            ])
            ->add('placesCapacity', EnumType::class, [
                'label' => 'Nombre de places',
                'class' => CapacityEnum::class,
                'choice_label' => function (CapacityEnum $enum) {
                    return $enum->getLabel();
                },
            ])
            ->add('transmissionType', EnumType::class, [
                'label' => 'Boîte de vitesse',
                'class' => TransmissionTypeEnum::class,
                'choice_label' => function (TransmissionTypeEnum $enum) {
                    return $enum->getLabel();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
