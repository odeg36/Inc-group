<?php 
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SubirCsvFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('archivo', 'file');
        $builder->add('enviar', 'submit');
    }

    public function getName()
    {
        return 'subirCsv';
    }
}
?>