<?php

namespace App\Controller\Admin;

use App\Entity\Ancestry;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AncestryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ancestry::class;
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
