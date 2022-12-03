<?php

namespace App\Controller\Admin;

use App\Entity\RecettesFinances;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecettesFinancesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RecettesFinances::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libelleRecette')->setLabel('Libellé de la Recettes des Finances'),
            AssociationField::new('tg')->setLabel('Trésorerie Générale'),
        ];
    }
}
