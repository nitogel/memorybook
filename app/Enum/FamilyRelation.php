<?php

namespace App\Enum;

enum FamilyRelation: string
{
    case boyfriend = 'boyfriend';
    case daughter = 'daughter';
    case son = 'son';
    case friend = 'friend';
    case father = 'father';
    case mother = 'mother';
    case sister = 'sister';
    case brother = 'brother';
    case wife = 'wife';
    case husband = 'husband';
}
