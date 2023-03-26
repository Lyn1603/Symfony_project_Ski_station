<?php

namespace App\Controller\Admin;

use App\Entity\Pistes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PistesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pistes::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
