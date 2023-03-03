<?php

namespace App\Form;

use App\Entity\Announce;
use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AnnounceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product')
            ->add('description')
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
//                'delete_label' => '...',
//                'download_label' => '...',
                'download_uri' => true,
                'image_uri' => true,
//                'imagine_pattern' => '...',
                'asset_helper' => true,
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Announce::class,
        ]);
    }


}
