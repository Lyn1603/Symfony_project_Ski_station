<?php

namespace App\Controller\Admin;

use App\Entity\Trail;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TrailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Trail::class;
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
