<?php

namespace App\Controller\Admin;

use App\Entity\Tresoreries;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TresoreriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tresoreries::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libelleTG')->setLabel('Libellé de la Trésorerie Générale'),
            AssociationField::new('circonscription')->setLabel('Circonscription Financière:'),
        ];
    }
}
