<?php

namespace App\Controller\Admin;

use App\Entity\Domaine;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DomaineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Domaine::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
	          ImageField::new('pictureUrl')
		          ->setUploadDir('public/uploads/domaine')
		          ->setBasePath('uploads/domaine')
		          ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }
    
}
