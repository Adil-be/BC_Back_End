<?php

namespace App\Form;

use App\Entity\UserImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
        $builder->add('file', VichImageType::class, [
            'required' => false,
            'allow_delete' => true,
            'delete_label' => 'delete',
            'download_uri' => true,
            'image_uri' => true,
            'asset_helper' => true,
            'imagine_pattern' => 'my_thumb',
            
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserImage::class,
        ]);
    }
}
