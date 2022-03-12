<?php

namespace App\Controller\Admin;

use App\Entity\CoreClass;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CoreClassCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CoreClass::class;
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
