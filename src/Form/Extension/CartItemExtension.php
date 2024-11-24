<?php

namespace App\Form\Extension;

use Sylius\Bundle\OrderBundle\Form\Type\CartItemType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Range;

class CartItemExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $min = 10;
        parent::buildForm($builder, $options);
        $builder
            ->add('quantity', IntegerType::class, [
                'attr' => ['min' => $min, 'step' => 10],
                'data' => $min,
                'label' => 'sylius.ui.quantity',
                'constraints' => [
                    new Range([
                        'min' => $min,
                        'groups' => ['sylius'],
                    ]),
                ],
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [CartItemType::class];
    }
}
