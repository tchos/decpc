<?php

namespace App\Controller\Admin;

use App\Entity\Circonscriptions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CirconscriptionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Circonscriptions::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libelleCirconscription'),
            AssociationField::new('equipe')->setLabel('Equipe:')
        ];
    }

}
