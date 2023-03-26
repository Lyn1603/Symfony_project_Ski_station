<?php

namespace App\Controller\Admin;

use App\Entity\Stations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class StationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Stations::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            ImageField::new('logo')
                ->setUploadDir('public/uploads/stations')
                ->setBasePath('uploads/stations')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextEditorField::new('description'),
        ];
    }

}
