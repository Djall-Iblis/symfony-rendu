<?php

namespace App\Controller\Admin;

use App\Entity\Gear;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GearCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gear::class;
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
